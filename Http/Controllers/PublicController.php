<?php

namespace Modules\PrivateMessage\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\PrivateMessage\Entities\Inbox;
use Modules\PrivateMessage\Repositories\MessageRepository;
use Modules\PrivateMessage\Repositories\ThreadRepository;

class PublicController extends BasePublicController
{
	/**
	 * @var ThreadRepository
	 */
	private $_thread;

	/**
	 * @var MessageRepository
	 */
	private $_message;

	public function __construct(ThreadRepository $thread, MessageRepository $message)
	{
		parent::__construct();
		$this->_thread = $thread;
		$this->_message = $message;
	}

	public function index($inbox = Inbox::TYPE_INBOX)
	{
		// TODO
		$userId = '';
		$threads = $this->_thread->listForUser($userId, $inbox);

		return view('privatemessage.index', compact('threads'));
	}

	public function show($threadId)
	{
		// TODO
		$userId = '';
		$thread = $this->_thread->find($threadId);
		$messages = $this->_message->findForUser($userId, $threadId);

		return view('privatemessage.show', compact('thread', 'messages'));
	}
}
