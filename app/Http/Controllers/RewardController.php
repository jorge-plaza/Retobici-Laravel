<?php

namespace App\Http\Controllers;

use App\Http\Resources\RewardResource;
use App\Http\Resources\RewardResourceObtained;
use App\Models\Reward;
use App\Models\User;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function getAllRewards(){
        return RewardResource::collection(Reward::all());
    }

    public function getNotRedeemedRewards(Request $request){
        $user = UserController::getUserByToken($request);
        $userR = $user->rewards()->get(['user_reward.reward_id AS result'])->pluck('result');
        return RewardResource::collection(Reward::all()->whereNotIn('id',$userR));
    }

    public function getUserRewards(Request $request){
        $user = UserController::getUserByToken($request);
        return RewardResourceObtained::collection($user->rewards()->orderByPivot('created_at', 'desc')->get());
    }

    public function obtainReward(Request $request, Reward $reward){
        $user = UserController::getUserByToken($request);
        if ($this->checkReward($user,$reward)){
            $reward->redeemed += 1;
            $reward->users()->attach($user);
            $user->points -= $reward->points;
            $reward->save();
            $user->save();
            return new RewardResourceObtained($reward);
        }
        return response()->json("Unable to redeem the reward", 500);
    }

    private function checkReward(User $user, Reward $reward){
        if ($reward->total_available <= $reward->redeemed){
            return false;
        }
        if ($user->rewards()->find($reward)){
            return false;
        }
        if ($user->points < $reward->points){
            return false;
        }
        return true;
    }
}
