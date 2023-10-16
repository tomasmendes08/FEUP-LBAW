<?php

namespace App\Http\Controllers;

use App\Models\ReportAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends ImageController
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
        $profile_image = $this->getImageUser($user, true);
        $header_image = $this->getImageUser($user, false);
        return view('pages.user.user_profile', ['user' => $user, 'profile_image' => $profile_image, 'header_image' => $header_image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);
        $this->authorize('update', $user);
        $profile_image = $this->getImageUser($user, true);
        $header_image = $this->getImageUser($user, false);

        $fav_spaces = array();
        // dd($user->favourite_spaces);
        for($i = 0; $i < count($user->favourite_spaces); $i++){
            array_push($fav_spaces, $user->favourite_spaces[$i]->space_name);
        }
        //dd($fav_spaces);
        return view('pages.user.edit_user_profile', ['user' => $user, 'header_image' => $header_image, 'profile_image' => $profile_image, 'fav_spaces' => $fav_spaces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $this->authorize('update', $user);

        //dd($request['spaces']);
        $this->validate($request, [
            'username' => ['required','string','max:18', Rule::unique('user')->ignore($user)],
            'email' => ['required','string','email','max:255', Rule::unique('user')->ignore($user)],
        ]);

        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->city = $request['city'];
        $user->description = $request['description'];
        $user->save();

        if($request->has('spaces')){
            $aux = new User();
            $user_fav_spaces = $aux->checkIfUserHasFavouriteSpace($user->user_id);
            //dd($user_fav_spaces);
            $diff_add = array_diff($request['spaces'], $user_fav_spaces);
            $diff_remove = array_diff($user_fav_spaces, $request['spaces']);

            if(!empty($diff_add)){
                // dd($diff_add);
                foreach($diff_add as $add){
                    //dd($add);
                    $aux->addUserFavouriteSpace($user->user_id, $add);
                }
            }

            if(!empty($diff_remove)){
                foreach($diff_remove as $remove){
                    //dd($remove);
                    $aux->removeUserFavouriteSpace($user->user_id, $remove);
                }
            }
        }
        else{
            $aux = new User();
            $user_fav_spaces = $aux->checkIfUserHasFavouriteSpace($user->user_id);

            foreach($user_fav_spaces as $fav_space){
                //dd($fav_space);
                $aux->removeUserFavouriteSpace($user->user_id, $fav_space);
            }
        }

        if ($request['removeProfilePic'] !== 'on') {
            if ($request->file('profile-pic') !== null) {
                $this->addImageUser($user, $request, true);
            }
        }
        else {
            $this->removeImageUser($user->user_id, true);
        }

        if ($request['removeHeaderPic'] !== 'on') {
            if ($request->file('header-pic') !== null) {
                $this->addImageUser($user, $request, false);
            }
        }
        else {
            $this->removeImageUser($user->user_id, false);
        }

        return redirect('/users/' . $user->user_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);

        Auth::logout();
        $user->delete();

        return redirect('/');
    }
}
