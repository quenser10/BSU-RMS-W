<?php

namespace App\Listeners;

use App\Events;
use App\Models\AdminLog;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events as LaravelEvents;

class LogActivity
{
    public function login(LaravelEvents\Login $event)
    {
        $ip = Request::getClientIp(true);
        //$this->info($event, "User {$event->user->email} logged in from {$ip}", $event->user->only('id', 'email'));
        if(auth()->guard('admin')->check()){
            AdminLog::create([
                "first_name" => $event->user->first_name,
                "last_name" => $event->user->last_name,
                "employee_id" => $event->user->employee_id,
                "ip_address" => $ip,
                "activity" => "Logged in"
            ]);
        }
        
    }

    public function logout(LaravelEvents\Logout $event)
    {
        $ip = Request::getClientIp(true);
        //$this->info($event, "User {$event->user->email} logged out from {$ip}", $event->user->only('id', 'email'));
        if(auth()->guard('admin')->check()){
        AdminLog::create([
            "first_name" => $event->user->first_name,
            "last_name" => $event->user->last_name,
            "employee_id" => $event->user->employee_id,
            "ip_address" => $ip,
            "activity" => "Logged out"
        ]);
    }
    }

    public function registered(LaravelEvents\Registered $event)
    {
        $ip = Request::getClientIp(true);
        //$this->info($event, "User registered: {$event->user->email} from {$ip}");
        if(auth()->guard('admin')->check()){
        AdminLog::create([
            "first_name" => $event->user->first_name,
            "last_name" => $event->user->last_name,
            "employee_id" => $event->user->employee_id,
            "ip_address" => $ip,
            "activity" => "Registered"
        ]);
    }
    }

    public function failed(LaravelEvents\Failed $event)
    {
        $ip = Request::getClientIp(true);
        //$this->info($event, "User {$event->credentials['email']} login failed from {$ip}", ['email' => $event->credentials['email']]);
    }

    public function passwordReset(LaravelEvents\PasswordReset $event)
    {
        $ip = Request::getClientIp(true);
        //$this->info($event, "User {$event->user->email} password reset from {$ip}", $event->user->only('id', 'email'));
        if(auth()->guard('admin')->check()){
        AdminLog::create([
            "first_name" => $event->user->first_name,
            "last_name" => $event->user->last_name,
            "employee_id" => $event->user->employee_id,
            "ip_address" => $ip,
            "activity" => "Password Reset"
        ]);
    }
    }

    protected function info(object $event, string $message, array $context = [])
    {
        //$class = class_basename($event::class);
        $class = get_class($event);

        Log::info("[{$class}] {$message}", $context);
    }
}
