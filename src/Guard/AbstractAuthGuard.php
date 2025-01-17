<?php

declare(strict_types=1);
/**
 * This file is part of qbhy/hyperf-auth.
 *
 * @link     https://github.com/qbhy/hyperf-auth
 * @document https://github.com/qbhy/hyperf-auth/blob/master/README.md
 * @contact  qbhy0715@qq.com
 * @license  https://github.com/qbhy/hyperf-auth/blob/master/LICENSE
 */
namespace Irooit\HyperfAuth\Guard;

use Irooit\HyperfAuth\Authenticatable;
use Irooit\HyperfAuth\AuthGuard;
use Irooit\HyperfAuth\UserProvider;

abstract class AbstractAuthGuard implements AuthGuard
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var UserProvider
     */
    protected $userProvider;

    /**
     * AbstractAuthGuard constructor.
     */
    public function __construct(array $config, string $name, UserProvider $userProvider)
    {
        $this->config = $config;
        $this->name = $name;
        $this->userProvider = $userProvider;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function check(): bool
    {
        return $this->user() instanceof Authenticatable;
    }

    public function guest(): bool
    {
        return ! $this->check();
    }

    public function getProvider(): UserProvider
    {
        return $this->userProvider;
    }

    public function id()
    {
        return $this->user()->getId();
    }
}
