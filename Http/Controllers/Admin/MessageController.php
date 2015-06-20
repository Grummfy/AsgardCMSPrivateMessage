<?php namespace Modules\PrivateMessage\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\PrivateMessage\Entities\Message;
use Modules\PrivateMessage\Repositories\MessageRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MessageController extends AdminBaseController
{
    /**
     * @var MessageRepository
     */
    private $message;

    public function __construct(MessageRepository $message)
    {
        parent::__construct();

        $this->message = $message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$messages = $this->message->all();

        return view('privatemessage::admin.messages.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('privatemessage::admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->message->create($request->all());

        Flash::success(trans('privatemessage::messages.messages.message created'));

        return redirect()->route('admin.privatemessage.message.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Message $message
     * @return Response
     */
    public function edit(Message $message)
    {
        return view('privatemessage::admin.messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Message $message
     * @param  Request $request
     * @return Response
     */
    public function update(Message $message, Request $request)
    {
        $this->message->update($message, $request->all());

        Flash::success(trans('privatemessage::messages.messages.message updated'));

        return redirect()->route('admin.privatemessage.message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Message $message
     * @return Response
     */
    public function destroy(Message $message)
    {
        $this->message->destroy($message);

        Flash::success(trans('privatemessage::messages.messages.message deleted'));

        return redirect()->route('admin.privatemessage.message.index');
    }
}
