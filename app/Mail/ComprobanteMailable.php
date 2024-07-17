<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComprobanteMailable extends Mailable
{
	use Queueable, SerializesModels;

	public $data;
	public $pdfPath;
	public $toEmail;

	/**
	 * Create a new message instance.
	 */
	public function __construct($data, $pdfPath, $toEmail)
	{
		$this->data = $data;
		$this->pdfPath = $pdfPath;
		$this->toEmail = $toEmail;
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Envío de Comprobante de Pago',
			to: [$this->toEmail]
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content
	{
		return new Content(
			view: 'admin.emails.comprobante',
			with: [
				'data' => $this->data,
			],
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
	 */
	public function attachments(): array
	{
		return [
			Attachment::fromPath($this->pdfPath)
				->as('comprobante.pdf')
				->withMime('application/pdf'),
		];
	}
}
