<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Helpers\ExoHelper as EH;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.manage_profile', [
            'user' => $request->user(),
        ]);
    }

    public function changeDP(Request $request)
    {
        try {
            $request->validate(
                [
                    'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'user_id' => 'required|exists:users,id',
                ],
                [
                    'image.image' => __('employee_validation.The file must be a valid image.'),
                    'image.mimes' => __('employee_validation.Allowed image types: jpeg, png, jpg, gif.'),
                    'image.max'   => __('employee_validation.Maximum allowed size is 2MB.'),

                    'user_id.required' => __('employee_validation.The user id field is required.'),
                    'user_id.exists'   => __('employee_validation.The selected user is invalid.'),
                ]
            );

            $user = $request->user();
            $user->image = EH::uploadFile($request->image);
            $user->update();

            parent::setResponse(true, __('profile.Profile Image Changed.'), EH::getFile($user->image));
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }
        return parent::getResponse();
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        parent::setResponse(true, __('profile.Profile updated successfully.'));

        return parent::getResponse();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
