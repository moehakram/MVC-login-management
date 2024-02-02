<?php

namespace App\Service;

use App\Repository\SessionRepository;
use App\Domain\{User, Session};
use App\Core\Config;
use App\Core\Features\TokenHandler;

use function App\Helper\request;

class SessionService
{
    private SessionRepository $sessionRepository;

    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

    public function create(User $user): Session
    {
        $session = new Session();
        $session->id = uniqid();
        $session->userId = $user->id;

        $payload = [
            'id' => $session->id,
            'name' => $user->name,
            'role' => $user->role
        ];

        $this->sessionRepository->save($session);

        $value = TokenHandler::generateToken($payload, Config::get('session.key'));
        setcookie(Config::get('session.name'), $value, Config::get('session.exp'), "/", "", false, true);

        return $session;
    }

    public function destroy()
    {
        $session = request()->getSession(Config::get('session.name'), Config::get('session.key'));
        $this->sessionRepository->deleteById($session->id);
        // $this->sessionRepository->deleteAll();
        setcookie(Config::get('session.name'), '', 1, "/");
    }

    public function current(): ?User
    {
        $payload = request()->getSession(Config::get('session.name'), Config::get('session.key'));
    
        if ($payload === null) {
            return null;
        }
    
        $session = $this->sessionRepository->findById($payload->id);
    
        if ($session === null) {
            $this->destroy();
            return null;
        }

        $user = new User();
        $user->id = $session->userId;
        $user->name = $payload->name;
        $user->role = $payload->role;

        return $user;
    }
}