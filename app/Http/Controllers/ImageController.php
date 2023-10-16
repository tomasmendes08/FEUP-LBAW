<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

abstract class ImageController extends Controller
{
    public function addImageUser(User $user, Request $request, bool $profilePic) {
        if ($profilePic) {
            if ($request->file('profile-pic') === null) return;
            $image = $request->file('profile-pic');
            $image_to_crop = Image::make($image->getRealPath());
            $image_to_save = $image_to_crop->crop(min([$image_to_crop->width(), $image_to_crop->height()]), min([$image_to_crop->width(), $image_to_crop->height()]));
            $path = public_path('images/userProfile/' . $user->user_id . '.jpg');
            $image_to_save->save($path);
        }
        else {
            if ($request->file('header-pic') === null) return;
            $image = $request->file('header-pic');
            $image_to_crop = Image::make($image->getRealPath());
            $image_to_save = $image_to_crop->crop(min([$image_to_crop->width(), $image_to_crop->height()]), min([$image_to_crop->width(), $image_to_crop->height()]));
            $path = public_path('images/userHeader/' . $user->user_id . '.jpg');
            $image_to_save->save($path);
        }
    }

    public function getImageUser(User $user, bool $profilePic) {
        if ($profilePic) {
            if (file_exists(public_path('images/userProfile/' . $user->user_id . '.jpg'))) {
                return asset('images/userProfile/' . $user->user_id . '.jpg');
            } else {
                return asset('images/userProfile/null.jpg');
            }
        }
        else {
            if (file_exists(public_path('images/userHeader/' . $user->user_id . '.jpg'))) {
                return asset('images/userHeader/' . $user->user_id . '.jpg');
            } else {
                return asset('images/userHeader/null.jpg');
            }
        }
    }

    public function removeImageUser(int $user_id, bool $profilePic) {
        if ($profilePic) {
            if (file_exists(public_path('images/userProfile/' . $user_id . '.jpg')))
                unlink(public_path('images/userProfile/' . $user_id . '.jpg'));
        } else {
            if (file_exists(public_path('images/userHeader/' . $user_id . '.jpg')))
                unlink(public_path('images/userHeader/' . $user_id . '.jpg'));
        }
    }

    public function addImageQuestion(Question $question, Request $request) {
        if ($request->file('image') === null) return;
        $image = $request->file('image');
        $image_to_save = Image::make($image->getRealPath());
        $path = public_path('/images/question/' . $question->question_id . '.jpg');
        $image_to_save->save($path);
    }

    public function removeImageQuestion(int $question_id) {
        if (file_exists(public_path('images/question/' . $question_id . '.jpg')))
            unlink(public_path('images/question/' . $question_id . '.jpg'));
    }

    public function addImageAnswer(Answer $answer, Request $request) {
        if ($request->file('image') === null) return;
        $image = $request->file('image');
        $image_to_save = Image::make($image->getRealPath());
        $path = public_path('/images/answer/' . $answer->answer_id . '.jpg');
        $image_to_save->save($path);
    }
}
