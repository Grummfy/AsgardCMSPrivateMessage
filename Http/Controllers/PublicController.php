<?php

namespace Modules\PrivateMessage\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\PrivateMessage\Repositories\ThreadRepository;

class PublicController extends BasePublicController
{
	/**
	 * @var ThreadRepository
	 */
	private $_thread;

	public function __construct(ThreadRepository $thread)
	{
		parent::__construct();
		$this->_thread = $thread;
	}

	public function index()
	{
		$posts = $this->_thread->allTranslatedIn(App::getLocale());

		return view('blog.index', compact('posts'));
	}

	public function show($slug)
	{
		$post = $this->post->findBySlug($slug);

		return view('blog.show', compact('post'));
	}
}
