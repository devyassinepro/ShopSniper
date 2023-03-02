<?php

use App\Models\Team;
use Illuminate\Support\Facades\Auth;

if (! function_exists('on_page')) {
    /**
     * Check's whether request url/route matches passed link.
     *
     * @param $link
     * @param string $type
     * @return null
     */
    function on_page($link, $type = 'name')
    {
        switch ($type) {
            case 'url':
                $result = ($link == request()->fullUrl());
                break;

            default:
                $result = ($link == request()->route()->getName());
        }

        return $result;
    }
}

if (! function_exists('return_if')) {
    /**
     * Appends passed value if condition is true.
     *
     * @param $condition
     * @param $value
     * @return null
     */
    function return_if($condition, $value)
    {
        if ($condition) {
            return $value;
        }
    }
}

if (! function_exists('currentTeam')) {
    /**
     * Get user's currently selected team...
     *
     * @return Team
     */
    function currentTeam()
    {
        return Auth::user()->currentTeam;
    }
}

if (! function_exists('team')) {
    /**
     * Appends passed value if condition is true.
     *
     * @return Team
     */
    function team()
    {
        Auth::user()->personalTeam();
    }
}

if (! function_exists('split_name')) {
    /**
     * uses regex that accepts any word character or hyphen in last name.
     *
     * @return array
     */
    function split_name($name)
    {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim(preg_replace('#'.$last_name.'#', '', $name));

        return [$first_name, $last_name];
    }
}

if (! function_exists('subscription_team')) {
    /**
     * uses regex that accepts any word character or hyphen in last name.
     *
     * @return array
     */
    function subscription_team($subscription)
    {
        return Team::find($subscription->team_id);
    }
}


if (! function_exists('check_user_type')) {
    /**
     * uses roles middleware to get user's type
     *
     * @return array
     */
    function check_user_type()
    {
        $authGuard = Auth::guard();
        
        if ($authGuard->guest()) {
            $user_type = 'guest';
        }
        
        $role = 'admin';
        $roles = is_array($role)
            ? $role
            : explode('|', $role);
        
        if (! $authGuard->user()->hasAnyRole($roles))
            $user_type = 'user';
        else
            $user_type = 'admin';

        return $user_type;
    }
}


if (! function_exists('check_store_limit')) {
    /**
     * get user's store limit
     *
     * @return array
     */
    function check_store_limit()
    {
        $currentTeam = currentTeam();
        if(!empty($currentTeam) && !empty($currentTeam->plan) && !empty($currentTeam->plan->store_access_count))
            return $currentTeam->plan->store_access_count;

        return 0;
    }
}