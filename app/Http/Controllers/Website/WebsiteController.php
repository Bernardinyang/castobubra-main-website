<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreGridnoxContactRequest;
use App\Http\Services\HelperService;
use App\Models\AcademicBoard;
use App\Models\AcademicStaff;
use App\Models\BoardOfTrustee;
use App\Models\Contact;
use App\Models\CTA;
use App\Models\GridnoxContact;
use App\Models\NewsAlert;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\SliderImage;
use App\Models\StudentCommunity;
use App\Models\StudentNewsBar;
use App\Models\StudentSlide;
use App\Models\WebsiteNewsBar;
use App\Models\WelcomeSection;
use App\Models\FAQ;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function index(): Factory|View|Application
    {
        $slider_images = SliderImage::all();
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $student_new_bars = StudentNewsBar::all();
        $student_community_slides = StudentSlide::all();
        $student_community = StudentCommunity::find(1);
        $galleries = Gallery::where('is_active', true)->orderBy('order', 'asc')->get();
        $posts = Post::where('published_at', '!=', NULL)->orderBy('date_of_event', 'desc')->get();
        $welcome_section = WelcomeSection::find(1);
        $cta = CTA::find(1);
        $slide_colors = ['blue', 'orange', 'red', 'green', 'blue', 'orange', 'red', 'green', 'blue', 'orange', 'red', 'green', 'blue', 'orange', 'red', 'green'];
        $news_alert = NewsAlert::where('is_active', true)->latest()->first();

        return view('website.home', [
            'slider_images' => $slider_images,
            'website_new_bars' => $website_new_bars,
            'student_new_bars' => $student_new_bars,
            'student_community_slides' => $student_community_slides,
            'student_community' => $student_community,
            'galleries' => $galleries,
            'posts' => $posts,
            'welcome_section' => $welcome_section,
            'cta' => $cta,
            'slide_colors' => $slide_colors,
            'news_alert' => $news_alert
        ]);
    }

    public function about(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.about', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function ourIdentity(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.our_identity', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function visionAndMission(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.vision_and_mission', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function newsAlertDetails(NewsAlert $news_alert): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.news_alert_detail', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'news_alert' => $news_alert
        ]);
    }

    public function organizationalChart(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.organizational_chart', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function collegeSong(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.college_song', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function governingCouncil(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $bots = BoardOfTrustee::all();

        return view('website.leadership', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'bots' => $bots
        ]);
    }

    public function academicBoard(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $bots = AcademicBoard::all();

        return view('website.academic_board', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'bots' => $bots
        ]);
    }

    public function academicStaffs(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $academic_staffs = AcademicStaff::all();

        return view('website.academic_staff', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'academic_staffs' => $academic_staffs
        ]);
    }

    public function contact(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.contact', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function storeContact(StoreContactRequest $request): ?RedirectResponse
    {
        $added = Contact::create(array_merge($request->validated(), [
            'unique_id' => strtoupper(Str::random(10)),
        ]));

        if ($added) {
            $subject = "Message from CASTObubra Contact Form";
            $headers = "From: " . $request->validated()['email'] . "\r\n" . "Reply-To: " . $request->validated()['email'];

            mail(HelperService::getSettings()->app_email, $subject, $request->validated()['message'], $headers);

            return redirect()->back()->with('status', 'Message sent, We will get back to you ASAP!');
        }

        return null;
    }

    public function quote(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.gridnox', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function storeQuote(StoreGridnoxContactRequest $request): ?RedirectResponse
    {
        $added = GridnoxContact::create(array_merge($request->validated(), [
            'unique_id' => strtoupper(Str::random(10)),
        ]));

        if ($added) {
            return redirect()->back()->with('status', 'Message sent, GRIDNOX will get back to you ASAP!');
        }

        return null;
    }

    public function entryRequirement(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $courseRequirements = $this->getCourseRequirements();

        return view('website.entry_requirement', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'courseRequirements' => $courseRequirements,
        ]);
    }

    /**
     * Get course requirements array
     */
    private function getCourseRequirements(): array
    {
        return [
            [
                'title' => 'ND ANIMAL HEALTH AND PRODUCTION TECHNOLOGY',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must obtain at least credit grades in English Language Mathematics and Chemistry should be compulsory while Physics should be optional or a Pass.'
                ]
            ],
            [
                'title' => 'HND. ANIMAL PRODUCTION',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must obtain at least credit grades in English Language Mathematics and Chemistry should be compulsory while Physics should be optional or a Pass.',
                    'A minimum of Lower Credit Pass (CGPA 2.50 and above) in the cognate National Diploma in any Agricultural Related Discipline obtained from accredited Programmes of recognized Institutions.',
                    'A minimum of Merit Pass in NCE in Agric Double Major.',
                    'A minimum of one-year post National Diploma cognate work experience (IT).'
                ]
            ],
            [
                'title' => 'ND. AGRICULTURAL TECHNOLOGY',
                'requirements' => [
                    'Five credits level passes in WAEC or NECO and NABTEB in not more than two sittings.',
                    'The subjects must include Biology/Agricultural Science, Chemistry and any three of the following: Geography, Mathematics, Economics, Technical Drawing, Physics and English language. At least, a pass in English language and Mathematics is compulsory.',
                    'Candidates who have successfully completed the Board\'s recognized pre-National diploma (Science Technology) course may be admitted into the Programme. Such students must have passed Biology/Agricultural science, Chemistry, Mathematics, English language and any one of the following subjects: Economics, Technical Drawing, Physics and Geography at WASC, SSSC, GCE O\'Level or NECO and NABTEB before undertaking the course.'
                ]
            ],
            [
                'title' => 'HND. CROP PRODUCTION',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must obtain at least credit grades in English Language Mathematics and Chemistry should be compulsory while Physics should be optional or a Pass.',
                    'A minimum of Lower Credit Pass (CGPA 2.50 and above) in the cognate National Diploma in any Agricultural Related Discipline obtained from accredited Programmes of recognized Institutions.',
                    'A minimum of Merit Pass in NCE in Agric Double Major.',
                    'A minimum of one-year post National Diploma cognate work experience (IT).'
                ]
            ],
            [
                'title' => 'HND. Agricultural Economics & Extension (Extension And Management Higher National Diploma in Agricultural)',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must obtain at least credit grades in English Language Mathematics and Chemistry should be compulsory while Physics should be optional or a Pass.',
                    'A minimum of Lower Credit Pass (CGPA 2.50 and above) in the cognate National Diploma in any Agricultural Related Discipline obtained from accredited Programmes of recognized Institutions.',
                    'A minimum of Merit Pass in NCE in Agric Double Major.',
                    'A minimum of one-year post National Diploma cognate work experience (IT).'
                ]
            ],
            [
                'title' => 'ND. HOSPITALITY AND TOURISM MANAGEMENT',
                'requirements' => [
                    'Entry requirements for the National Diploma in Hospitality and Management Technology programme include at least a minimum score in the Unified Tertiary Matriculation Examination (UTME), five credit passes at not more than two sittings in West African Senior School Certificate Examination (WASSCE), Senior School Certificate Examination (SSCE/NECO), National Technical Certificate (NTC), General Certificate of Education (GCE) Ordinary level, the West African Examination Certificate (WAEC) in the following subjects.',
                    'The subjects must include: English Language, Mathematics, Biology/Agricultural Science/Health Science and any two from the following: - Geography, Economics/Commerce, Food and Nutrition/Home Economics/Catering Craft/Tourism Studies, Marketing, Civic Education, Accounting, Chemistry and Physics.',
                    '(Details of Admission requirements are obtainable in the NBTE annual Directory of Accredited Programmes).'
                ]
            ],
            [
                'title' => 'ND. Forestry and Environmental Technology',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must, in addition, obtain at least pass grades in English Language, Mathematics and Chemistry.'
                ]
            ],
            [
                'title' => 'ND COMPUTER SCIENCE',
                'requirements' => [
                    'Five credit level passes in GCE "O" level, Senior Secondary School Certificate (SSCE), NECO and NABTEB at not more than two sittings.',
                    'The five subjects must include: English Language, Mathematics, Physics and two other subjects chosen from the following: Economics, Geography, Further Mathematics, Physics, Chemistry, Biology/Agricultural Science.',
                    'A Pass in Physics is compulsory for Computer Science.',
                    'And Relevant NTC/NBC & NVC Trades Plus JAMB Examination as resolved by National Policy on Education.',
                    'A pass in Computer Foundation Examination (CFE) of Computer Professionals Registration Council of Nigeria (CPN). The student must be prima fascia qualified as in (a) above.'
                ]
            ],
            [
                'title' => 'ND. Fisheries Technology',
                'requirements' => [
                    'Candidates must hold WASC or GCE "O" level or SSCE or NECO with a minimum of five (5) credit passes, obtained at not more than two sitting in each of the subjects listed:',
                    '(a) English Language',
                    '(b) Mathematics',
                    '(c) Physics',
                    '(d) Biology',
                    '(e) Chemistry'
                ]
            ],
            [
                'title' => 'ND. BUSINESS ADMINISTRATION',
                'requirements' => [
                    'The WASC, GCE \'O\' Level or the Senior Secondary Certificate (SSC) or their equivalent with four credits including English Language and Mathematics (Literature in English and Oral English are not acceptable in place of English Language) and two other subjects from economics, Business Methods, Principles of Accounts, Literature in English, Commerce, History, Statistics, Geography, Government, Agric Science/Biology.',
                    'A credit pass in N.B.T.E. recognized pre–National Diploma Examination.'
                ]
            ],
            [
                'title' => 'ND. SCIENCE LABORATORY TECHNOLOGY',
                'requirements' => [
                    'Entry requirements for the National Diploma in Science Laboratory Technology programme include at least a minimum score in the Unified Tertiary Matriculation Examination (UTME), five credit passes at not more than two sittings in West African Senior School Certificate Examination (WASSCE), Senior School Certificate Examination (SSCE), National Technical Certificate (NTC), General Certificate of Education (GCE) Ordinary level, or the West African Examination Certificate (WAEC) in relevant subjects.',
                    'The relevant subjects are: English Language, Mathematics, Physics, Chemistry and one other subject from: Metal Work, Wood Work, Technical Drawing, Basic Electronics, Basic Electricity, Economics, Commerce, Statistics, Further Mathematics, Computer Studies, Geography and Biology or Agricultural Science.',
                    '(Details of Admission requirements are obtainable in the NBTE annual Directory of Accredited Programmes).'
                ]
            ],
            [
                'title' => 'ND. VETERINARY LABORATORY TECHNOLOGY',
                'requirements' => [
                    'WASC/NECO/SSCE OR GCE \'O\' Level with a minimum of five (5) Credit passes obtained at not more than two sittings.',
                    'The five subjects must include: Biology /Agricultural Science/Animal Husbandry, Chemistry, Economics, English Language, Geography, Mathematics, Physics and Statistics.',
                    'Candidate must, in addition, obtain at least pass grades in English Language, Mathematics.'
                ]
            ],
        ];
    }

    public function admissionForm(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.application_guidelines', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'news_alert' => NewsAlert::where('is_active', true)->latest()->first()
        ]);
    }

    public function applicationInstruction(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.application_instruction', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'news_alert' => NewsAlert::where('is_active', true)->latest()->first()
        ]);
    }

    public function ndHndNursing(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.nd_hnd_nursing', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function fraudulentActivities(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.fraudulent_activities', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function fees(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.fees', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function courses(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.courses', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function departments(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.departments', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
        ]);
    }

    public function allNews(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $posts = Post::where('published_at', '!=', NULL)->orderBy('date_of_event', 'desc')->paginate(12);

        return view('website.all_news', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'posts' => $posts
        ]);
    }

    public function newsDetails(Post $post): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);

        return view('website.news', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'post' => $post
        ]);
    }

    public function faq(): Factory|View|Application
    {
        $website_new_bars = WebsiteNewsBar::where('is_active', true)->get();
        $cta = CTA::find(1);
        $faqs = FAQ::where('is_active', true)->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();

        return view('website.faq', [
            'website_new_bars' => $website_new_bars,
            'cta' => $cta,
            'faqs' => $faqs
        ]);
    }
}
