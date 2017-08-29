<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Input;
use Session;
use Redirect;
use Validator;
use App\Coordinator;
use App\Department;
use App\User;
use App\Course;
use App\Company;
use App\UsersLog;
use App\Task;
use App\CompanyEvaluation;
use App\HiredIntern;
use Carbon\Carbon;
use App\Journal;
use App\NatureSummary;
use App\NatureofWorks;
use App\AppSite;
use App\Notification;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
//   public function sendNotification()
//   {
//     $user = User::find(1);
//     $user->newNotification()
//     ->withType('RecipeFavorited')
//     ->withSubject('Your recipe has been favorited.')
//     ->withBody('<User X> has favorited your Caramel Cream Cakes recipe!')
//     ->regarding($recipe)
//     ->deliver();
//     $user = User::find(1);
// $unreadNotifications = $user->notifications()->unread()->get();
// $user = User::find(1);
// $notifications = $user->notifications()->unread()->count();
// return view(‘notification’, compact(‘unreadNotifications’, ‘notifications’, ‘newNotification’));
//   }
}
