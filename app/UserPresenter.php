<?php

namespace App;

class UserPresenter extends Presenter
{
    /**
     * Present a generic welcome message to the user.
     *
     * @return string
     */
    public function welcomeMessage()
    {
        return sprintf(
            'Welcome, %s. You signed up %s.',
            $this->user->name,
            $this->user->created_at->diffForHumans()
        );
    }
}
