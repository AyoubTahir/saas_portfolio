<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {
        $users =  User::where('is_admin', 0)->paginate(10);

        return view('admin.users.index', compact(['users']));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $user = User::where('is_admin', 0)->findorfail($id);

        return view('admin.users.edit', compact(['user']));
    }

    public function store(UsersRequest $request)
    {
        $data = $request->only($this->userFields());

        try {

            DB::beginTransaction();

            $user = (new SaveModel(new User(), $data))->execute();

            $user->hero()->create($this->heroFields());

            $user->about()->create($this->aboutFields());

            $interest = $user->interest()->create($this->interestFields());

            $interest->interestField()->createMany($this->interestFieldFields());

            $fact = $user->fact()->create($this->factFields());

            $fact->factsField()->createMany($this->factFieldFields());

            $service = $user->service()->create($this->serviceFields());

            $service->servicesField()->createMany($this->serviceFieldFields());

            $resume = $user->resume()->create($this->resumeFields());

            $resume->resumesField()->createMany($this->resumeFieldFields());

            $expertise = $user->expertise()->create($this->expertiseFields());

            foreach ($this->expertiseFieldFields() as $index => $val) {

                $expF = $expertise->expertisesField()->create($val);

                $expF->skills()->createMany($this->skillFields()[$index]);
            }

            $user->contact()->create($this->contactFields());

            $user->settings()->create($this->settingFields());

            $user->portfolio()->create($this->portfolioFields());

            DB::commit();

            return redirect()->route('users')->with(['success' => 'changed saved successfully']);
        } catch (\Exception $ex) {

            DB::rollback();

            return redirect()->route('users')->with(['errors_ms' => 'something wrong try again']);
        }
    }

    public function update(Request $request, $id)
    {
        $data = array_filter($request->only($this->userFields()));

        (new SaveModel(User::findorfail($id), $data))->execute();

        return redirect()->route('users')->with(['success' => 'changed updated successfully']);
    }

    public function delete($id)
    {
        $user = User::where('is_admin', 0)->findorfail($id);

        Storage::disk('uploads')->delete($user->image);

        $user->delete();

        return redirect()->route('users')->with(['success' => 'User has been deleted.']);
    }

    public function destroy(Request $request)
    {
        foreach ($request->ids as $id) {

            $user = User::where('is_admin', 0)->findorfail($id);

            Storage::disk('uploads')->delete($user->image);

            $user->delete();
        }

        return redirect()->route('users')->with(['success' => 'Users has been deleted.']);
    }

    private function userFields()
    {
        return ['name', 'email', 'password', 'status', 'image'];
    }

    private function heroFields()
    {
        return [
            'user_id' => Auth::id(),
            'title_ar' => 'طاهر ايوب',
            'title_en' => 'Tahir Ayoub',
            'job_ar' => 'مصمم ويب , مطور ويب , مصور',
            'job_en' => 'Web Designer, Web Developer, Photographer',
            'description_ar' => 'من الواضح أنني مصمم ويب. مطور ويب مع أكثر من 3 سنوات من الخبرة. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'description_en' => 'Obviously I\'m a Web Designer. Web Developer with over 3 years of experience. Experienced with all stages of the development cycle for dynamic web projects.',
            'button_ar' => 'اتصل بي',
            'button_en' => 'Contact me',
            'cover' => 'images/hero_back.jpg',
            'image' => 'images/hero_img.png'
        ];
    }

    private function aboutFields()
    {
        return [
            'user_id' => Auth::id(),
            'full_name_ar' => 'طاهر ايوب',
            'full_name_en' => 'Tahir Ayoub',
            'sub_title_ar' => 'أنا شغوف',
            'sub_title_en' => 'I\'m a Passionate',
            'job_ar' => 'مصمم ويب',
            'job_en' => 'Web Designer',
            'description_ar' => 'من الواضح أنني مصمم ويب. مطور ويب مع أكثر من 3 سنوات من الخبرة. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية. بدلاً من استخدام "يوجد محتوى هنا ، يوجد محتوى هنا" ، مما يجعلها تبدو وكأنها إنجليزية قابلة للقراءة.الهدف من استخدام لوريم إيبسوم هو أنه يحتوي على توزيع طبيعي -إلى حد ما- للأحرف ، بدلاً من استخدام "هنا يوجد محتوى نصي ، هنا يوجد محتوى نصي" ، مما يجعلها تبدو وكأنها إنجليزية قابلة للقراءة.',
            'description_en' => 'Obviously I\'m a Web Designer. Web Developer with over 3 years of experience. Experienced with all stages of the development cycle for dynamic web projects. The as opposed to using Content here, content here, making it look like readable English.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English.',
            'button_ar' => 'معرض اعمالي',
            'button_en' => 'View Portfolio',
            'image' => 'images/about.png',
            'status' => 1
        ];
    }

    private function interestFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'الهوايات والاهتمامات',
            'title_en'          => 'HOBBIES & INTERESTS',
            'description_ar'    => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'description_en'    => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'status'            => 1,
        ];
    }

    private function interestFieldFields()
    {
        return [
            [
                'name_ar'           => 'نظام التشغيل',
                'name_en'           => 'Mac OS',
                'icon'              => 'video',
            ],
            [
                'name_ar'           => 'اندرويد',
                'name_en'           => 'Android',
                'icon'              => 'target',
            ],
            [
                'name_ar'           => 'رياضات',
                'name_en'           => 'Sports',
                'icon'              => 'book',
            ],
            [
                'name_ar'           => 'نشاط آخر',
                'name_en'           => 'Other Activity',
                'icon'              => 'smartphone',
            ],
            [
                'name_ar'           => 'تطوير',
                'name_en'           => 'Developing',
                'icon'              => 'monitor',
            ],
            [
                'name_ar'           => 'تصميم',
                'name_en'           => 'Designing',
                'icon'              => 'stop-circle',
            ],
            [
                'name_ar'           => 'قراءة',
                'name_en'           => 'Reading',
                'icon'              => 'box',
            ],
            [
                'name_ar'           => 'قهوة',
                'name_en'           => 'Coffee',
                'icon'              => 'coffee',
            ],
        ];
    }

    private function factFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'حقائق',
            'title_en'          => 'Facts',
            'cover'             => 'images/fact.jpg',
            'status'            => 1,
        ];
    }

    private function factFieldFields()
    {
        return [
            [
                'title_ar'          => 'Happy Client',
                'title_en'          => 'عميل سعيد',
                'number'            => '1251',
                'icon'              => 'smile',
            ],
            [
                'title_ar'          => 'Award Won',
                'title_en'          => 'فاز بالجائزة',
                'number'            => '15',
                'icon'              => 'award',
            ],
            [
                'title_ar'          => 'Cup of Coffee',
                'title_en'          => 'كوب من القهوة',
                'number'            => '3261',
                'icon'              => 'coffee',
            ],
            [
                'title_ar'          => 'Project Complete',
                'title_en'          => 'اكتمل المشروع',
                'number'            => '36',
                'icon'              => 'thumbs-up',
            ],
        ];
    }

    private function serviceFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'ماذا أعرض؟',
            'title_en'          => 'WHAT DO I OFFER ?',
            'description_ar'    => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'description_en'    => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'status'            => 1,
        ];
    }

    private function serviceFieldFields()
    {
        return [
            [
                'name_ar'           => 'تصميم UX / UI',
                'name_en'           => 'UX / UI Design',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'airplay',
            ],
            [
                'name_ar'           => 'مصمم تطبيقات iOS',
                'name_en'           => 'Ios App Designer',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'aperture',
            ],
            [
                'name_ar'           => 'التصوير',
                'name_en'           => 'Photography',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'camera',
            ],
            [
                'name_ar'           => 'مصمم جرافيك',
                'name_en'           => 'Graphic Designer',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'compass',
            ],
            [
                'name_ar'           => '24 / 7',
                'name_en'           => '24 / 7',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'watch',
            ],
            [
                'name_ar'           => 'أمن الويب',
                'name_en'           => 'Web Security',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.',
                'icon'              => 'settings',
            ],
        ];
    }

    private function resumeFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'المشاركة في العمل',
            'title_en'          => 'WORK PARTICIPATION',
            'description_ar'    => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'description_en'    => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'status'            => 1,
        ];
    }

    private function resumeFieldFields()
    {
        return [
            [
                'name_ar'           => 'مصمم UX',
                'name_en'           => 'UX Designer',
                'job_ar'            => 'مصمم أول',
                'job_en'            => 'Vivo - Senior Designer',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.	',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.	',
                'date_from'         => '2015-05-01',
                'date_to'           => '2018-07-10',
            ],
            [
                'name_ar'           => 'مطور ويب',
                'name_en'           => 'Web Developer',
                'job_ar'            => 'مدير الموارد البشرية',
                'job_en'            => 'Oppo - HR Manager',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.	',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.	',
                'date_from'         => '2012-03-01',
                'date_to'           => '2015-05-01',
            ],
            [
                'name_ar'           => 'مصمم جرافيك',
                'name_en'           => 'Graphic Designer',
                'job_ar'            => 'أبل - تستور',
                'job_en'            => 'Apple - Testor',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.	',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.	',
                'date_from'         => '2010-03-11',
                'date_to'           => '2012-02-14',
            ],
            [
                'name_ar'           => 'أمن الويب',
                'name_en'           => 'Web Security',
                'job_ar'            => 'مدير الموارد البشرية',
                'job_en'            => 'Oppo - HR Manager',
                'desc_ar'           => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سيلهي القارئ عن التركيز على الشكل العام للقارئ.	',
                'desc_en'           => 'It is a long established fact that a reader will be distracted by the when looking at its layout.	',
                'date_from'         => '2002-02-05',
                'date_to'           => '2010-03-18',
            ],
        ];
    }

    private function expertiseFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'خبرة العمل',
            'title_en'          => 'Work Expertise',
            'description_ar'    => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'description_en'    => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'image'             => 'images/expertise.jpg',
            'status'            => 1,
        ];
    }

    private function expertiseFieldFields()
    {
        return [
            [
                'name_ar'           => 'تصميم UX',
                'name_en'           => 'UX Design',
            ],
            [
                'name_ar'           => 'مهارات اللغة',
                'name_en'           => 'Language Skill',
            ],
            [
                'name_ar'           => 'تطوير الشبكة',
                'name_en'           => 'Web development',
            ],
        ];
    }

    private function skillFields()
    {
        return [
            [
                [
                    'skill_ar'              => 'HTML',
                    'skill_en'              => 'HTML',
                    'lvl'                   => 84,
                ],
                [
                    'skill_ar'              => 'CSS',
                    'skill_en'              => 'CSS',
                    'lvl'                   => 75,
                ],
                [
                    'skill_ar'              => 'JQuery',
                    'skill_en'              => 'JQuery',
                    'lvl'                   => 79,
                ],
            ],
            [
                [
                    'skill_ar'              => 'العربية',
                    'skill_en'              => 'Arabic',
                    'lvl'                   => 98,
                ],
                [
                    'skill_ar'              => 'الإنجليزية',
                    'skill_en'              => 'English',
                    'lvl'                   => 84,
                ],
                [
                    'skill_ar'              => 'الأسبانية',
                    'skill_en'              => 'Spanish',
                    'lvl'                   => 75,
                ],
            ],
            [
                [
                    'skill_ar'              => 'php',
                    'skill_en'              => 'php',
                    'lvl'                   => 80,
                ],
                [
                    'skill_ar'              => 'java',
                    'skill_en'              => 'java',
                    'lvl'                   => 68,
                ],
            ]
        ];
    }

    private function contactFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'اتصل بي',
            'title_en'          => 'CONTACT ME',
            'desc_ar'           => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'desc_en'           => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'email'             => 'contact@example.com',
            'email_desc_ar'     => 'واعدة اضطرابات التنمية التعليم الشامل المجتمع التحولي',
            'email_desc_en'     => 'Promising development turmoil inclusive education transformative community',
            'phone'             => '+152 534-468-854',
            'phone_desc_ar'     => 'واعدة اضطرابات التنمية التعليم الشامل المجتمع التحولي',
            'phone_desc_en'     => 'Promising development turmoil inclusive education transformative community',
            'address_ar'        => 'النخيل مراكش, طريق حدائق النخيل، مراكش',
            'address_en'        => ' Nakheel Marrakech, Palm Gardens Road, Marrakech',
            'address_link'      => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54355.815237982075!2d-7.9051775916936045!3d31.627320955351635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdaff1c1ab2cad2d%3A0x4897c149fb81b880!2z2KfZhNmG2K7ZitmE2Iwg2YXYsdin2YPYtA!5e0!3m2!1sar!2sma!4v1632319483197!5m2!1sar!2sma',
            'status'            => 1
        ];
    }

    private function settingFields()
    {
        return [
            'user_id'           => Auth::id(),
            'website_name_ar'       => 'طاهر',
            'website_name_en'       => 'Tahir',
            'footer_desc_ar'        => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'footer_desc_en'        => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'facebook'              => 'https://www.facebook.com/',
            'instagram'             => 'https://www.instagram.com/',
            'twiter'                => 'https://twitter.com/',
            'linkedin'              => 'https://linkedin.com',
            'light_logo_ar'         => 'images/light_logo.png',
            'light_logo_en'         => 'images/light_logo.png',
            'dark_logo_ar'          => 'images/dark_logo.png',
            'dark_logo_en'          => 'images/dark_logo.png',
            'theme_mode'            => 1,
            'website_status'        => 1,
        ];
    }

    private function portfolioFields()
    {
        return [
            'user_id'           => Auth::id(),
            'title_ar'          => 'اعمالي',
            'title_en'          => 'POROJECTS',
            'desc_ar'    => 'من الواضح أنني مصمم ويب. من ذوي الخبرة في جميع مراحل دورة التطوير لمشاريع الويب الديناميكية.',
            'desc_en'    => 'Obviously I\'m a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.',
            'status'            => 1,
        ];
    }
}
