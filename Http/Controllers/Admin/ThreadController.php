<?php namespace Modules\PrivateMessage\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\PrivateMessage\Entities\Thread;
use Modules\PrivateMessage\Repositories\ThreadRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ThreadController extends AdminBaseController
{
    /**
     * @var ThreadRepository
     */
    private $thread;

    public function __construct(ThreadRepository $thread)
    {
        parent::__construct();

        $this->thread = $thread;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$threads = $this->thread->all();

        return view('privatemessage::admin.threads.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('privatemessage::admin.threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->thread->create($request->all());

        Flash::success(trans('privatemessage::threads.messages.thread created'));

        return redirect()->route('admin.privatemessage.thread.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Thread $thread
     * @return Response
     */
    public function edit(Thread $thread)
    {
        return view('privatemessage::admin.threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Thread $thread
     * @param  Request $request
     * @return Response
     */
    public function update(Thread $thread, Request $request)
    {
        $this->thread->update($thread, $request->all());

        Flash::success(trans('privatemessage::threads.messages.thread updated'));

        return redirect()->route('admin.privatemessage.thread.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Thread $thread
     * @return Response
     */
    public function destroy(Thread $thread)
    {
        $this->thread->destroy($thread);

        Flash::success(trans('privatemessage::threads.messages.thread deleted'));

        return redirect()->route('admin.privatemessage.thread.index');
    }
}
