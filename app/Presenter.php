<?php

namespace App;

use Exception;

abstract class Presenter
{
    /**
     * The authenticated user.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new Presenter instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        // You could also remain this to
        // something more generic, like $model.
        $this->user = $user;
    }

    /**
     * Handle dynamic property calls.
     *
     * @param  string $property
     * @return mixed
     */
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

        $message = '%s does not respond to the "%s" property or method.';

        throw new Exception(
            sprintf($message, static::class, $property)
        );
    }
}
