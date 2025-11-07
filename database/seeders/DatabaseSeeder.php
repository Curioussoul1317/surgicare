<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;   
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'asad@gmail.com',
            'password' => Hash::make('Unknown@123'),
            'email_verified_at' => now(),
            'is_admin' => 1, 
        ]);

        // Create Departments
        $departments = [
            [
                'name' => 'Cardiology',
                'description' => 'Specialized care for heart and cardiovascular conditions. Our cardiology department offers comprehensive diagnostic and treatment services for all types of heart diseases.',
                'icon' => 'fas fa-heartbeat',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Orthopedics',
                'description' => 'Expert care for bones, joints, ligaments, tendons, and muscles. We provide advanced treatment for fractures, sports injuries, and joint disorders.',
                'icon' => 'fas fa-bone',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'General Surgery',
                'description' => 'Comprehensive surgical care using minimally invasive techniques. Our surgeons are experienced in a wide range of procedures from routine to complex surgeries.',
                'icon' => 'fas fa-user-md',
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'Pediatrics',
                'description' => 'Complete healthcare for infants, children, and adolescents. We provide a child-friendly environment with specialized care for young patients.',
                'icon' => 'fas fa-child',
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'Neurology',
                'description' => 'Advanced diagnosis and treatment of brain, spine, and nervous system disorders. Our neurologists use state-of-the-art technology for accurate diagnosis.',
                'icon' => 'fas fa-brain',
                'is_active' => true,
                'order' => 5
            ],
            [
                'name' => 'Dermatology',
                'description' => 'Comprehensive skin care including medical and cosmetic dermatology. We treat all skin conditions and offer advanced aesthetic procedures.',
                'icon' => 'fas fa-hand-sparkles',
                'is_active' => true,
                'order' => 6
            ],
            [
                'name' => 'Obstetrics & Gynecology',
                'description' => 'Complete women\'s health care including pregnancy, childbirth, and reproductive health. We provide compassionate care at every stage of a woman\'s life.',
                'icon' => 'fas fa-female',
                'is_active' => true,
                'order' => 7
            ],
            [
                'name' => 'Ophthalmology',
                'description' => 'Advanced eye care and vision correction services. Our ophthalmologists provide comprehensive treatment for all eye conditions.',
                'icon' => 'fas fa-eye',
                'is_active' => true,
                'order' => 8
            ],
            [
                'name' => 'ENT (Ear, Nose & Throat)',
                'description' => 'Specialized care for disorders of the ear, nose, throat, and related head and neck structures. We offer both medical and surgical treatments.',
                'icon' => 'fas fa-head-side-mask',
                'is_active' => true,
                'order' => 9
            ],
            [
                'name' => 'Dental',
                'description' => 'Complete dental care from routine checkups to advanced procedures. We focus on preventive care and creating beautiful, healthy smiles.',
                'icon' => 'fas fa-tooth',
                'is_active' => true,
                'order' => 10
            ]
        ];

        $departmentModels = [];
        foreach ($departments as $dept) {
            $departmentModels[] = Department::create($dept);
        }

        // Create Services (Realistic services offered under departments)
        $services = [
            // Cardiology Services
            [
                'name' => 'ECG (Electrocardiogram)',
                'short_description' => 'Heart rhythm and electrical activity monitoring',
                'description' => 'An ECG is a simple test that records the electrical activity of your heart. It helps diagnose heart rhythm problems, heart attacks, and other heart conditions.',
                'price' => 150.00,
                'duration' => 15,
                'is_active' => true
            ],
            [
                'name' => 'Echocardiography',
                'short_description' => 'Ultrasound imaging of the heart',
                'description' => 'An echocardiogram uses sound waves to create detailed images of your heart\'s structure and function. It helps evaluate heart valve problems, heart muscle damage, and blood flow.',
                'price' => 800.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Cardiac Catheterization',
                'short_description' => 'Invasive procedure to diagnose heart conditions',
                'description' => 'A thin tube is threaded through blood vessels to your heart to diagnose and treat certain cardiovascular conditions. Used for both diagnosis and treatment of blocked arteries.',
                'price' => 5000.00,
                'duration' => 120,
                'is_active' => true
            ],
            [
                'name' => 'Stress Test',
                'short_description' => 'Heart performance evaluation during exercise',
                'description' => 'A stress test monitors your heart\'s activity during physical exercise. It helps diagnose coronary artery disease and determine safe levels of exercise.',
                'price' => 400.00,
                'duration' => 60,
                'is_active' => true
            ],
            
            // Orthopedic Services
            [
                'name' => 'Joint Replacement Surgery',
                'short_description' => 'Hip, knee, and shoulder joint replacement',
                'description' => 'Advanced joint replacement surgery using the latest prosthetic implants. We specialize in minimally invasive techniques for faster recovery and better outcomes.',
                'price' => 12000.00,
                'duration' => 180,
                'is_active' => true
            ],
            [
                'name' => 'Arthroscopy',
                'short_description' => 'Minimally invasive joint surgery',
                'description' => 'A surgical procedure using a small camera to diagnose and treat joint problems. Commonly used for knee, shoulder, and hip conditions with minimal scarring.',
                'price' => 6000.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Fracture Treatment',
                'short_description' => 'Comprehensive bone fracture care',
                'description' => 'Expert treatment of bone fractures including casting, splinting, and surgical fixation. We ensure proper healing and restoration of function.',
                'price' => 3000.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Sports Medicine Consultation',
                'short_description' => 'Athletic injury assessment and treatment',
                'description' => 'Specialized care for sports-related injuries including ligament tears, muscle strains, and overuse injuries. We help athletes return to peak performance.',
                'price' => 250.00,
                'duration' => 45,
                'is_active' => true
            ],
            
            // General Surgery Services
            [
                'name' => 'Appendectomy',
                'short_description' => 'Surgical removal of the appendix',
                'description' => 'Emergency or scheduled removal of an inflamed appendix using laparoscopic techniques. Minimally invasive approach ensures faster recovery.',
                'price' => 4500.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Hernia Repair',
                'short_description' => 'Surgical correction of hernias',
                'description' => 'Expert repair of inguinal, umbilical, and hiatal hernias using mesh reinforcement. Both open and laparoscopic techniques available.',
                'price' => 5000.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Gallbladder Removal',
                'short_description' => 'Laparoscopic cholecystectomy',
                'description' => 'Minimally invasive removal of the gallbladder for gallstones or gallbladder disease. Quick recovery with minimal scarring.',
                'price' => 5500.00,
                'duration' => 75,
                'is_active' => true
            ],
            [
                'name' => 'Thyroid Surgery',
                'short_description' => 'Surgical treatment of thyroid conditions',
                'description' => 'Partial or complete removal of the thyroid gland for nodules, cancer, or hyperthyroidism. Performed with precision to protect surrounding structures.',
                'price' => 6000.00,
                'duration' => 120,
                'is_active' => true
            ],
            
            // Pediatrics Services
            [
                'name' => 'Well-Child Checkup',
                'short_description' => 'Routine health examination for children',
                'description' => 'Comprehensive health assessment including physical examination, growth monitoring, and developmental screening. Essential for maintaining your child\'s health.',
                'price' => 100.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Child Vaccination',
                'short_description' => 'Immunization services for children',
                'description' => 'Complete vaccination program following recommended immunization schedules. Protects children from preventable diseases.',
                'price' => 150.00,
                'duration' => 20,
                'is_active' => true
            ],
            [
                'name' => 'Newborn Care',
                'short_description' => 'Comprehensive care for newborns',
                'description' => 'Specialized care for newborn babies including health assessment, feeding guidance, and early detection of potential health issues.',
                'price' => 200.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Pediatric Emergency Care',
                'short_description' => 'Urgent care for children',
                'description' => 'Immediate medical attention for childhood emergencies including high fever, injuries, breathing problems, and acute illnesses.',
                'price' => 300.00,
                'duration' => 60,
                'is_active' => true
            ],
            
            // Neurology Services
            [
                'name' => 'EEG (Electroencephalogram)',
                'short_description' => 'Brain activity monitoring test',
                'description' => 'Non-invasive test that records electrical activity in your brain. Used to diagnose epilepsy, sleep disorders, and other neurological conditions.',
                'price' => 600.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'MRI Brain Scan',
                'short_description' => 'Detailed brain imaging',
                'description' => 'High-resolution magnetic resonance imaging of the brain to detect tumors, stroke, multiple sclerosis, and other neurological conditions.',
                'price' => 2000.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Stroke Management',
                'short_description' => 'Emergency stroke treatment and rehabilitation',
                'description' => 'Comprehensive stroke care including emergency treatment, rehabilitation, and prevention strategies. Time-critical intervention saves lives.',
                'price' => 8000.00,
                'duration' => 240,
                'is_active' => true
            ],
            [
                'name' => 'Migraine Treatment',
                'short_description' => 'Specialized headache management',
                'description' => 'Expert diagnosis and treatment of chronic migraines and headaches. Includes preventive medications and lifestyle modifications.',
                'price' => 250.00,
                'duration' => 45,
                'is_active' => true
            ],
            
            // Dermatology Services
            [
                'name' => 'Skin Cancer Screening',
                'short_description' => 'Full body examination for skin cancer',
                'description' => 'Comprehensive skin examination to detect melanoma and other skin cancers. Early detection saves lives.',
                'price' => 200.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Acne Treatment',
                'short_description' => 'Medical treatment for acne',
                'description' => 'Personalized treatment plans for acne including topical medications, oral antibiotics, and advanced therapies like chemical peels.',
                'price' => 180.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Laser Hair Removal',
                'short_description' => 'Permanent hair reduction treatment',
                'description' => 'Safe and effective laser treatment for permanent hair reduction on face and body. Multiple sessions required for best results.',
                'price' => 500.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Botox & Fillers',
                'short_description' => 'Anti-aging cosmetic treatments',
                'description' => 'Injectable treatments to reduce wrinkles and restore facial volume. Non-surgical approach to looking younger.',
                'price' => 800.00,
                'duration' => 30,
                'is_active' => true
            ],
            
            // OB/GYN Services
            [
                'name' => 'Prenatal Care',
                'short_description' => 'Comprehensive pregnancy care',
                'description' => 'Regular checkups throughout pregnancy including ultrasounds, tests, and monitoring to ensure healthy pregnancy and delivery.',
                'price' => 300.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Normal Delivery',
                'short_description' => 'Vaginal childbirth services',
                'description' => 'Complete labor and delivery care with experienced obstetricians and supportive staff. Ensuring safe delivery for mother and baby.',
                'price' => 5000.00,
                'duration' => 480,
                'is_active' => true
            ],
            [
                'name' => 'Cesarean Section',
                'short_description' => 'Surgical delivery procedure',
                'description' => 'Safe surgical delivery when vaginal birth is not possible or recommended. Performed by experienced obstetricians with excellent outcomes.',
                'price' => 8000.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Gynecological Examination',
                'short_description' => 'Routine women\'s health checkup',
                'description' => 'Annual wellness exam including pap smear, breast examination, and screening for reproductive health issues.',
                'price' => 200.00,
                'duration' => 30,
                'is_active' => true
            ],
            
            // Ophthalmology Services
            [
                'name' => 'Cataract Surgery',
                'short_description' => 'Surgical removal of eye cataract',
                'description' => 'Modern phacoemulsification surgery to remove cataracts and restore clear vision. Quick procedure with excellent success rate.',
                'price' => 3500.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'LASIK Surgery',
                'short_description' => 'Laser vision correction',
                'description' => 'Advanced laser eye surgery to correct nearsightedness, farsightedness, and astigmatism. Reduce dependence on glasses.',
                'price' => 4000.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Glaucoma Treatment',
                'short_description' => 'Medical and surgical glaucoma care',
                'description' => 'Comprehensive treatment to control eye pressure and prevent vision loss from glaucoma. Includes medications and laser therapy.',
                'price' => 1500.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Comprehensive Eye Exam',
                'short_description' => 'Complete eye health evaluation',
                'description' => 'Thorough examination of eye health and vision including prescription check, eye pressure measurement, and retinal examination.',
                'price' => 150.00,
                'duration' => 45,
                'is_active' => true
            ],
            
            // ENT Services
            [
                'name' => 'Tonsillectomy',
                'short_description' => 'Surgical removal of tonsils',
                'description' => 'Safe removal of chronically infected or enlarged tonsils. Provides relief from recurrent throat infections and sleep problems.',
                'price' => 3000.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Sinus Surgery',
                'short_description' => 'Endoscopic sinus surgery',
                'description' => 'Minimally invasive surgery to open blocked sinuses and improve drainage. Provides long-term relief from chronic sinusitis.',
                'price' => 4500.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Hearing Test',
                'short_description' => 'Comprehensive hearing evaluation',
                'description' => 'Complete audiological assessment to diagnose hearing loss and determine appropriate treatment or hearing aid fitting.',
                'price' => 200.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Ear Tube Insertion',
                'short_description' => 'Treatment for chronic ear infections',
                'description' => 'Placement of tiny tubes in eardrums to prevent fluid buildup and recurrent ear infections, especially in children.',
                'price' => 2500.00,
                'duration' => 30,
                'is_active' => true
            ],
            
            // Dental Services
            [
                'name' => 'Dental Checkup & Cleaning',
                'short_description' => 'Routine dental examination',
                'description' => 'Comprehensive oral examination with professional teeth cleaning. Essential for maintaining oral health and preventing cavities.',
                'price' => 150.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Tooth Filling',
                'short_description' => 'Cavity treatment and restoration',
                'description' => 'Treatment of dental cavities with high-quality composite or amalgam fillings. Restores tooth structure and function.',
                'price' => 200.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Root Canal Treatment',
                'short_description' => 'Treatment for infected tooth',
                'description' => 'Removal of infected pulp tissue from tooth to save it from extraction. Relieves pain and preserves natural tooth.',
                'price' => 800.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Dental Implant',
                'short_description' => 'Permanent tooth replacement',
                'description' => 'Surgical placement of titanium implant to replace missing tooth. Most natural-looking and long-lasting tooth replacement option.',
                'price' => 3000.00,
                'duration' => 120,
                'is_active' => true
            ],
            [
                'name' => 'Teeth Whitening',
                'short_description' => 'Professional tooth bleaching',
                'description' => 'Professional teeth whitening treatment for a brighter smile. Safe and effective removal of stains and discoloration.',
                'price' => 500.00,
                'duration' => 60,
                'is_active' => true
            ]
        ];

        $serviceModels = [];
        foreach ($services as $service) {
            $serviceModels[] = Service::create($service);
        }

        // Assign Services to Departments
        $departmentModels[0]->services()->attach([1, 2, 3, 4]); // Cardiology
        $departmentModels[1]->services()->attach([5, 6, 7, 8]); // Orthopedics
        $departmentModels[2]->services()->attach([9, 10, 11, 12]); // General Surgery
        $departmentModels[3]->services()->attach([13, 14, 15, 16]); // Pediatrics
        $departmentModels[4]->services()->attach([17, 18, 19, 20]); // Neurology
        $departmentModels[5]->services()->attach([21, 22, 23, 24]); // Dermatology
        $departmentModels[6]->services()->attach([25, 26, 27, 28]); // OB/GYN
        $departmentModels[7]->services()->attach([29, 30, 31, 32]); // Ophthalmology
        $departmentModels[8]->services()->attach([33, 34, 35, 36]); // ENT
        $departmentModels[9]->services()->attach([37, 38, 39, 40, 41]); // Dental

        // Create Doctors
        $doctors = [
            [
                'name' => 'Dr. John Smith',
                'specialization' => 'General Surgeon',
                'qualification' => 'MBBS, MS (Surgery), FACS',
                'experience_years' => 15,
                'bio' => 'Dr. John Smith is a board-certified general surgeon with over 15 years of experience. He specializes in minimally invasive surgical techniques and has performed thousands of successful procedures. Dr. Smith is committed to providing personalized care and achieving the best possible outcomes for his patients.',
                'email' => 'john.smith@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Sarah Johnson',
                'specialization' => 'Cardiologist',
                'qualification' => 'MBBS, MD (Cardiology), FACC',
                'experience_years' => 12,
                'bio' => 'Dr. Sarah Johnson is an experienced cardiologist specializing in interventional cardiology. She has extensive experience in treating complex heart conditions and has published numerous research papers in prestigious medical journals. Dr. Johnson is dedicated to preventive cardiology and patient education.',
                'email' => 'sarah.johnson@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Michael Chen',
                'specialization' => 'Orthopedic Surgeon',
                'qualification' => 'MBBS, MS (Orthopedics), FRCS',
                'experience_years' => 18,
                'bio' => 'Dr. Michael Chen is a highly skilled orthopedic surgeon with expertise in joint replacement and sports medicine. He has helped countless athletes return to their peak performance and has a reputation for excellence in complex orthopedic procedures. Dr. Chen uses the latest surgical techniques to ensure optimal patient outcomes.',
                'email' => 'michael.chen@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Emily Williams',
                'specialization' => 'Pediatrician',
                'qualification' => 'MBBS, MD (Pediatrics), FAAP',
                'experience_years' => 10,
                'bio' => 'Dr. Emily Williams is a compassionate pediatrician who believes in building strong relationships with children and their families. She provides comprehensive care for children from birth through adolescence and has a special interest in developmental pediatrics and childhood nutrition.',
                'email' => 'emily.williams@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. David Martinez',
                'specialization' => 'Neurologist',
                'qualification' => 'MBBS, MD (Neurology), FAAN',
                'experience_years' => 14,
                'bio' => 'Dr. David Martinez is a board-certified neurologist with extensive experience in treating neurological disorders. He specializes in stroke management, epilepsy, and movement disorders. Dr. Martinez is known for his thorough diagnostic approach and personalized treatment plans.',
                'email' => 'david.martinez@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Lisa Anderson',
                'specialization' => 'Dermatologist',
                'qualification' => 'MBBS, MD (Dermatology), FAAD',
                'experience_years' => 9,
                'bio' => 'Dr. Lisa Anderson is a skilled dermatologist specializing in both medical and cosmetic dermatology. She has extensive training in laser procedures, skin cancer detection, and anti-aging treatments. Dr. Anderson is committed to helping patients achieve healthy, beautiful skin.',
                'email' => 'lisa.anderson@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Robert Taylor',
                'specialization' => 'Obstetrician & Gynecologist',
                'qualification' => 'MBBS, MD (OB/GYN), FACOG',
                'experience_years' => 16,
                'bio' => 'Dr. Robert Taylor is an experienced obstetrician and gynecologist who has delivered thousands of babies throughout his career. He provides comprehensive women\'s healthcare with a focus on patient comfort and safety. Dr. Taylor is known for his gentle approach and excellent bedside manner.',
                'email' => 'robert.taylor@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Jennifer Lee',
                'specialization' => 'Ophthalmologist',
                'qualification' => 'MBBS, MS (Ophthalmology), FACS',
                'experience_years' => 11,
                'bio' => 'Dr. Jennifer Lee is a skilled ophthalmologist specializing in cataract surgery and refractive procedures. She has performed thousands of successful eye surgeries and is committed to helping patients achieve the best possible vision. Dr. Lee stays current with the latest advances in ophthalmology.',
                'email' => 'jennifer.lee@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. James Wilson',
                'specialization' => 'ENT Specialist',
                'qualification' => 'MBBS, MS (ENT), FACS',
                'experience_years' => 13,
                'bio' => 'Dr. James Wilson is an experienced ENT specialist treating disorders of the ear, nose, throat, and related structures. He has expertise in sinus surgery, hearing restoration, and voice disorders. Dr. Wilson is dedicated to providing comprehensive care for patients of all ages.',
                'email' => 'james.wilson@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ],
            [
                'name' => 'Dr. Maria Garcia',
                'specialization' => 'Dentist',
                'qualification' => 'DDS, MSD',
                'experience_years' => 8,
                'bio' => 'Dr. Maria Garcia is a skilled dentist providing comprehensive dental care with a focus on preventive dentistry and patient education. She is experienced in cosmetic dentistry, dental implants, and restorative procedures. Dr. Garcia is committed to creating beautiful, healthy smiles for her patients.',
                'email' => 'maria.garcia@surgicare.com',
                'phone' => '9969317',
                'is_active' => true
            ]
        ];

        foreach ($doctors as $doctorData) {
            $doctor = Doctor::create($doctorData);
            
            // Assign Doctors to Departments and Services
            switch($doctor->name) {
                case 'Dr. John Smith':
                    $doctor->departments()->attach([3]); // General Surgery
                    $doctor->services()->attach([9, 10, 11, 12]); // Surgery services
                    break;
                case 'Dr. Sarah Johnson':
                    $doctor->departments()->attach([1]); // Cardiology
                    $doctor->services()->attach([1, 2, 3, 4]); // Cardiology services
                    break;
                case 'Dr. Michael Chen':
                    $doctor->departments()->attach([2]); // Orthopedics
                    $doctor->services()->attach([5, 6, 7, 8]); // Orthopedic services
                    break;
                case 'Dr. Emily Williams':
                    $doctor->departments()->attach([4]); // Pediatrics
                    $doctor->services()->attach([13, 14, 15, 16]); // Pediatric services
                    break;
                case 'Dr. David Martinez':
                    $doctor->departments()->attach([5]); // Neurology
                    $doctor->services()->attach([17, 18, 19, 20]); // Neurology services
                    break;
                case 'Dr. Lisa Anderson':
                    $doctor->departments()->attach([6]); // Dermatology
                    $doctor->services()->attach([21, 22, 23, 24]); // Dermatology services
                    break;
                case 'Dr. Robert Taylor':
                    $doctor->departments()->attach([7]); // OB/GYN
                    $doctor->services()->attach([25, 26, 27, 28]); // OB/GYN services
                    break;
                case 'Dr. Jennifer Lee':
                    $doctor->departments()->attach([8]); // Ophthalmology
                    $doctor->services()->attach([29, 30, 31, 32]); // Ophthalmology services
                    break;
                case 'Dr. James Wilson':
                    $doctor->departments()->attach([9]); // ENT
                    $doctor->services()->attach([33, 34, 35, 36]); // ENT services
                    break;
                case 'Dr. Maria Garcia':
                    $doctor->departments()->attach([10]); // Dental
                    $doctor->services()->attach([37, 38, 39, 40, 41]); // Dental services
                    break;
            }
        }
    }
}