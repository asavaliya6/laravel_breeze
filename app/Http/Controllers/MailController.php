<?PHP
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
    
class MailController extends Controller
{

    public function index()
    {
        $mailData = [
            'title' => 'Mail from Me',
            'body' => 'This is for testing email using smtp.'
        ];
           
        Mail::to('aditisavaliya68@gmail.com')->send(new DemoMail($mailData));
             
        dd("Email is sent successfully.");
    }
}
