<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Download;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Http\Request;
use App\Mail\TestEmail;

Route::post('/mail-send', function (Request $request) {
    $request->validate(
        [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ],
        [
            'name.required' => 'Nama harus diisi.',
            'subject.required' => 'Subjek harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'message.required' => 'Pesan harus diisi.',
        ],
    );
    $data = [
        'name' => $request->name,
        'subject' => $request->subject,
        'email' => $request->email,
        'message' => $request->message,
    ];
    FacadesMail::to('farhanlubis.nf@gmail.com')->send(new TestEmail($data));
    return redirect()->back()->with('success', 'Terima kasih telah menghubungi kami! Kami akan segera merespons pesan Anda');
})->name('mail.send');
Route::get('/d-comprof', [Download::class, 'comprof'])->name('d-comprof');

require __DIR__ . '/auth.php';
