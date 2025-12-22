@extends('layouts.website.sub_pages_sidebar')

@section('meta_tags')
    @include('partials.__meta_tags', [
        'description' => "At CAST Obubra, knowledge takes root and excellence grows. We don't just teach agriculture, science, and technology — we inspire innovators, empower communities, and raise leaders to shape a sustainable future",
        'title' => "College of Agriculture, Science and Technology, Obubra - Cross River State",
    ])
@endsection

@section('breadcrumbs')
    <section class="page__title-area page__title-height page__title-overlay d-flex align-items-center"
             data-background="{{ asset('website_assets/img/banner/castobubra-banner-bg-about.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="page__title-wrapper mt-110">
                        <h3 class="page__title">Courses</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('website.home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">ND ONE - FIRST SEMESTER</h3>
    </div>
    <div class="course__tab-inner bg-light rounded accordion-custom" style="text-align: justify;">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_1" aria-expanded="false" aria-controls="course_1">
                            NUS113 - Human Anatomy
                        </button>
                    </h2>
                </div>

                <div id="course_1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course deals with the structure and functions of the normal human body. This is essential
                        for better understanding of deviations from normal.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_2" aria-expanded="false" aria-controls="course_2">
                            NUS114 - Human Physiology I
                        </button>
                    </h2>
                </div>

                <div id="course_2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course exposes the student nurse to practical aspects and functions of each part of the
                        human body. Physiology is imperative in enhancing the understanding of the course content.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_3" aria-expanded="false" aria-controls="course_3">
                            NUR111 - Foundation of Nursing I
                        </button>
                    </h2>
                </div>

                <div id="course_3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is the foundation for the practice of nursing in home, community and health
                        institutions and for further professional education which the student needs to apply throughout
                        the whole programme
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_4" aria-expanded="false" aria-controls="course_4">
                            NUS117 - Medical Microbiology
                        </button>
                    </h2>
                </div>

                <div id="course_4" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Microbiology is the study of both unicellular and simple multi-cellular microscopic organisms
                        (micro-organisms). Medical microbiology is concerned with the study of those
                        microorganisms-bacteria, viruses, parasites and fungi which are detrimental to the health of
                        man, by their ability to produce disease. The study of microbiology at this level provides the
                        student nurse the opportunity to acquire a broad knowledge about the different types of
                        organisms, and their relevance in disease causation, as well as the application of
                        microbiological principles in disease control.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_5" aria-expanded="false" aria-controls="course_5">
                            GNS102 - Communication in English
                        </button>
                    </h2>
                </div>

                <div id="course_5" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        English language is the official means of communication in Nigeria. This course is therefore
                        designed to equip students with the knowledge and skills of proper use of English language to
                        facilitate the attainment of sound academic standard, and enhance effective communication.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_6" aria-expanded="false" aria-controls="course_6">
                            NUS112 - Applied Physics
                        </button>
                    </h2>
                </div>

                <div id="course_6" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course is designed to provide applied knowledge in physics for application in clinical
                        nursing practice.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_7" aria-expanded="false" aria-controls="course_7">
                            NUS111 - Applied Chemistry
                        </button>
                    </h2>
                </div>

                <div id="course_7" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course is designed to provide applied knowledge in physics for application in clinical
                        nursing practice.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_8" aria-expanded="false" aria-controls="course_8">
                            NUS115 - Introduction to Sociology
                        </button>
                    </h2>
                </div>

                <div id="course_8" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to facilitate students understanding of concepts and principles in
                        sociology. The relevance of these concepts and their influences on human behaviour in health and
                        illness, are explored.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_9" aria-expanded="false" aria-controls="course_9">
                            NUS112 - Use of Computer
                        </button>
                    </h2>
                </div>

                <div id="course_9" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The increasing need for application of information communication technology (ICT) to all spheres
                        of human endeavour makes it important that the nurse keeps abreast of ICT and its application to
                        healthcare. The course is designed to introduce the student to ICT and its importance to
                        healthcare delivery.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 mt-30 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">ND ONE - SECOND SEMESTER</h3>
    </div>
    <div class="course__tab-inner bg-light rounded accordion-custom" style="text-align: justify;">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_10" aria-expanded="false" aria-controls="course_10">
                            NUS121 - Human Anatomy II
                        </button>
                    </h2>
                </div>

                <div id="course_10" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course further exposes student to the normal structure, of respiratory, Digestive, urinary,
                        integumentary system and endocrine system.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_11" aria-expanded="false" aria-controls="course_11">
                            NUS122 - Human Physiology
                        </button>
                    </h2>
                </div>

                <div id="course_11" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course enhances the students’ understanding of the functions of respiratory, Digestive,
                        urinary, integumentary system and endocrine system.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_12" aria-expanded="false" aria-controls="course_12">
                            NUR121 - Foundation of Nursing II
                        </button>
                    </h2>
                </div>

                <div id="course_12" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to equip the student with the knowledge and skills in basic nursing
                        procedures, aseptic techniques, injection safety and legal aspects of nursing.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_13" aria-expanded="false" aria-controls="course_13">
                            NUR122 - Primary Health Care I
                        </button>
                    </h2>
                </div>

                <div id="course_13" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course exposes the students to the rationale for making healthcare available to all. It is
                        designed to equip students with the knowledge, skills and attitudes essential for teamwork and
                        to efficiently assist Individuals, families and communities in identifying, prioritizing and
                        attending to their health needs in a responsible and sustainable manner.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_14" aria-expanded="false" aria-controls="course_14">
                            NUS125 - Pharmacology I
                        </button>
                    </h2>
                </div>

                <div id="course_14" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to provide information on the importance of pharmacology in nursing and
                        the responsibilities of the nurse in drug administration. It equips the student with skills in
                        understanding terminologies used in drug administration. Emphasis is laid on preparation and
                        administration of drugs.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_15" aria-expanded="false" aria-controls="course_15">
                            GNS 125 Hospital Based Clinical Practice I
                        </button>
                    </h2>
                </div>

                <div id="course_15" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The students are posted to clinical areas for the first time where they meet trained nurses
                        whose duties and responsibilities are to mentor the student nurse in acquisition of the desired
                        clinical experience.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_16" aria-expanded="false" aria-controls="course_16">
                            NUS124 - Human Nutrition
                        </button>
                    </h2>
                </div>

                <div id="course_16" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Nutrition, the science of food nutrients is a very vital aspect of health promotion and
                        maintenance, management and control of health/illness, as well as restoration of optimal health
                        functioning. A host of psychological, physical and socio-cultural factors that affect the
                        nutritional and food habits of individuals, families and communities are discussed. Students of
                        nursing need to understand, not only the components of food but also their various roles in
                        health and illness as well as the various factors that affect the selection and eating of food.
                        The knowledge of the principles of nutrition acquired from this course would be applied in the
                        planning and preparation of therapeutic diets. This would be relevant throughout the entire
                        training programme as part of the total care of clients in health and illness.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_17" aria-expanded="false" aria-controls="course_17">
                            GNS126 - Paediatric Nursing
                        </button>
                    </h2>
                </div>

                <div id="course_17" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course introduces the student nurse to the care of infants and children who cannot express
                        themselves as to the level of seriousness of pain and associated signs and symptoms of diseases.
                        The nurse with her vast experience in the care of patients utilizes her skills in the
                        identification of such clinical manifestations for appropriate intervention.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_18" aria-expanded="false" aria-controls="course_18">
                            GST120 - Psychology
                        </button>
                    </h2>
                </div>

                <div id="course_18" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to facilitate students’ knowledge of concepts and principles relating to
                        human growth and development. It will assist the students in understanding human behaviour and
                        problems at each stage of development and their implications to nursing practice.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 mt-30 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">ND TWO - FIRST SEMESTER</h3>
    </div>
    <div class="course__tab-inner bg-light rounded accordion-custom" style="text-align: justify;">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_19" aria-expanded="false" aria-controls="course_19">
                            NUS211 - Human Anatomy III
                        </button>
                    </h2>
                </div>

                <div id="course_19" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to equip students with the knowledge of structure of reproductive and
                        endocrine systems.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_20" aria-expanded="false" aria-controls="course_20">
                            NUS212 - Human Physiology III
                        </button>
                    </h2>
                </div>

                <div id="course_20" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course enhances the students’ understanding of the functions of the reproductive and the
                        endocrine systems.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_21" aria-expanded="false" aria-controls="course_21">
                            NUR211 - Foundation of Nursing III
                        </button>
                    </h2>
                </div>

                <div id="course_21" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to equip students with advance knowledge and skills in patient care and
                        emergency resuscitation.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_22" aria-expanded="false" aria-controls="course_22">
                            NUR213 - Medical Surgical Nursing I
                        </button>
                    </h2>
                </div>

                <div id="course_22" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Medical-surgical nursing practice requires a wide range of activities of involves holistic care
                        and is rooted in health promotion, disease prevention, health maintenance and restoration which
                        may be carried out in community and institutional settings. The course is designed to equip
                        students with knowledge and skill require for the care of patients with medical/surgical
                        conditions.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_23" aria-expanded="false" aria-controls="course_23">
                            GNS212 - Medical Surgical Nursing I
                        </button>
                    </h2>
                </div>

                <div id="course_23" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Adult health problems require a wide range of skills to provide not only the necessary physical
                        care but also psychological support. Hence the delivery of expert comprehensive care with
                        understanding of the full impact of the disorder on the individual quality of life is very
                        important. This course is therefore designed to equip student with knowledge and skill in the
                        management of patients with problems of dermatological, digestive, genitor-urinary and
                        respiratory systems.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_24" aria-expanded="false" aria-controls="course_24">
                            NUR212 - Primary Health Care (PHC) II
                        </button>
                    </h2>
                </div>

                <div id="course_24" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is a follow-up to primary healthcare I and focuses on the implementation of the
                        components (element) of primary healthcare as adapted by the country.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_25" aria-expanded="false" aria-controls="course_25">
                            NUS213 - Pharmacology II
                        </button>
                    </h2>
                </div>

                <div id="course_25" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course is designed information on national drug policy, pharmaco-vigilance and drug
                        revolving fund. It also discusses the drugs used for conditions apart from systemic disorders.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_26" aria-expanded="false" aria-controls="course_26">
                            GNS215 - Hospital Based Clinical Practice II
                        </button>
                    </h2>
                </div>

                <div id="course_26" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The students are posted to clinical areas for the acquisition of the desired skills to
                        competently practise safe nursing service delivery to client, family and society
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_27" aria-expanded="false" aria-controls="course_27">
                            NUS215 - Biostatistics
                        </button>
                    </h2>
                </div>

                <div id="course_27" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course highlights the use and importance of statistics in health care delivery. It
                        introduces student to basic statistical principles and methods used in analysing and presenting
                        data in an empirical study.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_28" aria-expanded="false" aria-controls="course_28">
                            NUR214 - Research Methodology I
                        </button>
                    </h2>
                </div>

                <div id="course_28" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The study of research is an important means of achieving professionalism in Nursing. The course
                        is designed to introduce the students to research concepts and serve as a motivating factor in
                        developing interest in research. The course covers overview of research, introduction to nursing
                        research and preliminary steps in the research process.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_29" aria-expanded="false" aria-controls="course_29">
                            GNS211 - Communication in English II
                        </button>
                    </h2>
                </div>

                <div id="course_29" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course promotes acquisition of requisite skills in communication art. It further promotes
                        mastery in the use of English language as a means of communication.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #F2C85C;"
         class="course__tab-inner mb-10 mt-30 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-uppercase">ND TWO - SECOND SEMESTER</h3>
    </div>
    <div class="course__tab-inner bg-light rounded accordion-custom" style="text-align: justify;">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_30" aria-expanded="false" aria-controls="course_30">
                            NUS221 - Human Anatomy IV
                        </button>
                    </h2>
                </div>

                <div id="course_30" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course provides students with the knowledge of structure and functions of the nervous of
                        structure and special senses.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_31" aria-expanded="false" aria-controls="course_31">
                            NUS222 - Human Physiology IV
                        </button>
                    </h2>
                </div>

                <div id="course_31" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course enhances the students’ understanding of the functions of the nervous system and
                        special senses
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_32" aria-expanded="false" aria-controls="course_32">
                            NUR221 - Foundation of Nursing IV
                        </button>
                    </h2>
                </div>

                <div id="course_32" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to provide students with advance knowledge and skills in specialized
                        nursing procedures and managements of Medical-Surgical emergencies.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_33" aria-expanded="false" aria-controls="course_33">
                            NUR222 - Medical Surgical Nursing II
                        </button>
                    </h2>
                </div>

                <div id="course_33" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The course is designed to provide students with information on selected conditions affecting the
                        musculoskeletal, metabolic, endocrine, neurologic and cardiovascular systems. The course will
                        cover the related anatomy and physiology, diagnostic procedures, nursing management of the
                        disorders utilizing the nursing process and preventive measures of the selected conditions.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_34" aria-expanded="false" aria-controls="course_34">
                            NUR223 - Reproductive Health I
                        </button>
                    </h2>
                </div>

                <div id="course_34" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Reproductive health I is designed to expose the student to pertinent concepts in reproductive
                        health factors influencing health status of women, obstetrical and gynaecological conditions.
                        The knowledge and skills acquired will help the nurse to function effectively in meeting the
                        reproductive health needs of clients in homes, health institutions and the community.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_35" aria-expanded="false" aria-controls="course_35">
                            NUR224 - Mental Health Nursing I
                        </button>
                    </h2>
                </div>

                <div id="course_35" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to facilitate students’ understanding of concepts of mental health and
                        mental illness and recognize the effect of social and human dynamics in the development of
                        mental health problems. It also equips the student with the knowledge and skill to recognize
                        mental health problems and manage appropriately.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_36" aria-expanded="false" aria-controls="course_36">
                            EED216 - Nursing Entrepreneurship
                        </button>
                    </h2>
                </div>

                <div id="course_36" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to equip the students with knowledge and rudimentary of entrepreneurship
                        needed in nursing practice.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_37" aria-expanded="false" aria-controls="course_37">
                            NUR225 - Research Methodology II
                        </button>
                    </h2>
                </div>

                <div id="course_37" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course is designed to equip the students with the knowledge and skills to carry out
                        independent nursing research as well as develop interest in dissemination of research findings.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_38" aria-expanded="false" aria-controls="course_38">
                            NUR226 - Seminar in Nursing
                        </button>
                    </h2>
                </div>

                <div id="course_38" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This is to encourage student nurses to undertake research and present findings of such research
                        in class to be moderated by a tutor in order to achieve the objective of scholarship.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_39" aria-expanded="false" aria-controls="course_39">
                            NUR227 - Client Care Study
                        </button>
                    </h2>
                </div>

                <div id="course_39" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        This course equips the student nurse with the skill of promoting interpersonal relationship with
                        the client and application of the Nursing process in clients’ care.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_30" aria-expanded="false" aria-controls="course_30">
                            NUR228 - Community Based Clinical Practice I
                        </button>
                    </h2>
                </div>

                <div id="course_30" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The students are posted to various communities in order to interact with the people, educate
                        them on the prevalent disease conditions and how to identify such conditions based on the health
                        education they give them and the need to report to the hospital for appropriate intervention.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#course_31" aria-expanded="false" aria-controls="course_31">
                            NUR229 - Hospital Based Clinical Practice III
                        </button>
                    </h2>
                </div>

                <div id="course_31" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        The students are posted to clinical areas for the acquisition of the desired skills to
                        competently practise safe nursing service delivery to client, family and society
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>

@endsection
