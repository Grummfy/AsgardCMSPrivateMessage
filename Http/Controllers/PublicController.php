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
		$userId = $this->auth->id();
		$threads = $this->_thread->listForUser($userId, $inbox);

		return view('private-message::pm.index', compact('threads'));
	}

	public function show($threadId)
	{
		$userId = $this->auth->id();
		$thread = $this->_thread->find($threadId);
		$messages = $this->_message->findForUser($userId, $threadId);

		return view('private-message::pm.show', compact('thread', 'messages'));
	}

	public function createThread()
	{
		return view('private-message::pm.new_thread');
	}

	public function responseToMessage($threadId)
	{
		return view('private-message::pm.new_message');
	}

//
//	/**
//	 * Store a newly created resource in storage.
//	 *
//	 * @param  Request $request
//	 * @return Response
//	 */
//	public function store(Request $request)
//	{
//		$this->thread->create($request->all());
//
//		Flash::success(trans('privatemessage::threads.messages.thread created'));
//
//		return redirect()->route('admin.privatemessage.thread.index');
//	}
//
//	/**
//	 * Remove the specified resource from storage.
//	 *
//	 * @param  Message $message
//	 * @return Response
//	 */
//	public function destroy(Message $message)
//	{
//		$this->message->destroy($message);
//
//		Flash::success(trans('privatemessage::messages.messages.message deleted'));
//
//		return redirect()->route('admin.privatemessage.message.index');
//	}
}
