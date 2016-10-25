<?php

namespace App\Http\Middleware;

use Closure;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Mail\SmtpMailer;

class EmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rs = $next($request);

        $mail = new Message;

        if($request->user()){
            $mail->setFrom('John <xx@example.com>')
                ->addTo($request->user()->email)
                ->setSubject('注册确认')
                ->setBody("你好, 请点击下面的链接激活注册.");

            $mailer = new SmtpMailer([
                    'host' => 'smtp.example.com',
                    'username' => 'xx',
                    'password' => '******',
            ]);

            $mailer->send($mail);
        }

        return $rs;
    }
}
