<?php
namespace Mamadou\Php8BackendApi;

use Exception;
use Mamadou\Php8BackendApi\Exception\InvalidValidationException;

require_once dirname(__DIR__) . '/endpoints/User.php';

enum UserAction: string
{
    case CREATE = 'create';
    case RETRIEVE = 'retrieve';
    case RETRIEVE_ALL = 'retrieveAll';
    case REMOVE = 'remove';
    case UPDATE = 'update';
    public function getResponse()
    {
        $userData = file_get_contents('php://input');
        $userData = json_decode($userData);

        $userId = !empty($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
        $user = new User('test@yopmail.com', 'Hamza', 'MARÉGA', '0000000000'); // for test deleting after

        try {
            $response =  match ($this) {
                self::CREATE => $user->create($userData),
                self::RETRIEVE => $user->retrieve($userId),
                self::RETRIEVE_ALL => $user->retrieveAll(),
                self::REMOVE => $user->remove(),
                self::UPDATE => $user->update($userData),
            };

        } catch (InvalidValidationException | Exception $exception) {
            $response = [
                'errors' => [
                    'message' => sprintf('%s', $exception->getMessage()),
                    'code' => sprintf('%d', $exception->getCode())
                ]
            ];
        }

        return json_encode($response);
    }
}

$action = $_GET['action'] ?? null;

$userAction = match ($action) {
    'create' => UserAction::CREATE,
    'retrieve' => UserAction::RETRIEVE,
    'remove' => UserAction::REMOVE,
    'update' => UserAction::UPDATE,
    default => UserAction::RETRIEVE_ALL
};

echo $userAction->getResponse();