<?php

namespace Modules\PrivateMessage\Entities;

interface Inbox
{
	const TYPE_ARCHIVE = 'archive';
	const TYPE_INBOX = 'inbox';
	const TYPE_OUTBOX = 'outbox';
}
