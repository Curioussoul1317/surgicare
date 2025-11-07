<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Doctor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'asad@gmail.com',
            'password' => Hash::make('Unknown@123'),
            'email_verified_at' => now(),
            'is_admin' => 1, 
        ]);

        // Create Services
        $services = [
            [
                'name' => 'General Surgery',
                'short_description' => 'Comprehensive surgical procedures for various conditions',
                'description' => 'Our general surgery department provides a wide range of surgical procedures including appendectomies, hernia repairs, and gallbladder removal. Our experienced surgeons use the latest minimally invasive techniques to ensure faster recovery times and better outcomes for our patients.',
                'price' => 5000.00,
                'duration' => 120,
                'is_active' => true
            ],
            [
                'name' => 'Orthopedic Surgery',
                'short_description' => 'Specialized care for bones, joints, and muscles',
                'description' => 'Our orthopedic surgery department specializes in treating injuries and diseases affecting the musculoskeletal system. We offer joint replacement, fracture repair, sports medicine procedures, and spine surgery with state-of-the-art equipment and techniques.',
                'price' => 8000.00,
                'duration' => 180,
                'is_active' => true
            ],
            [
                'name' => 'Cardiology',
                'short_description' => 'Heart health diagnosis and treatment',
                'description' => 'Our cardiology department provides comprehensive cardiovascular care including diagnostic testing, interventional procedures, and cardiac rehabilitation. We use advanced technology to diagnose and treat heart conditions including coronary artery disease, heart failure, and arrhythmias.',
                'price' => 3000.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Neurology',
                'short_description' => 'Specialized neurological care and treatment',
                'description' => 'Our neurology department offers expert diagnosis and treatment of conditions affecting the brain, spinal cord, and nervous system. We treat conditions such as epilepsy, stroke, multiple sclerosis, Parkinson\'s disease, and headache disorders.',
                'price' => 2500.00,
                'duration' => 90,
                'is_active' => true
            ],
            [
                'name' => 'Pediatrics',
                'short_description' => 'Comprehensive healthcare for children',
                'description' => 'Our pediatric department provides complete healthcare services for infants, children, and adolescents. We offer well-child checkups, immunizations, treatment of acute and chronic illnesses, and developmental assessments in a child-friendly environment.',
                'price' => 200.00,
                'duration' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Dermatology',
                'short_description' => 'Skin care and cosmetic treatments',
                'description' => 'Our dermatology department treats a wide range of skin conditions including acne, eczema, psoriasis, and skin cancer. We also offer cosmetic procedures such as laser treatments, chemical peels, and anti-aging therapies.',
                'price' => 300.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Obstetrics & Gynecology',
                'short_description' => 'Women\'s health and pregnancy care',
                'description' => 'Our OB/GYN department provides comprehensive women\'s healthcare including prenatal care, delivery services, gynecological surgeries, and family planning. We are committed to supporting women through all stages of life with compassionate and expert care.',
                'price' => 4000.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'Ophthalmology',
                'short_description' => 'Eye care and vision correction',
                'description' => 'Our ophthalmology department offers comprehensive eye care services including cataract surgery, LASIK, glaucoma treatment, and retinal procedures. We use advanced diagnostic equipment to ensure the best possible outcomes for your vision.',
                'price' => 2000.00,
                'duration' => 60,
                'is_active' => true
            ],
            [
                'name' => 'ENT (Ear, Nose & Throat)',
                'short_description' => 'Treatment for ear, nose, and throat conditions',
                'description' => 'Our ENT department treats conditions affecting the ear, nose, throat, and related structures of the head and neck. We offer treatment for hearing loss, sinus problems, sleep apnea, voice disorders, and head and neck cancers.',
                'price' => 1500.00,
                'duration' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Dental Services',
                'short_description' => 'Complete dental care and oral surgery',
                'description' => 'Our dental department provides comprehensive oral healthcare including preventive care, fillings, root canals, extractions, dental implants, and cosmetic dentistry. We use modern techniques to ensure comfortable and effective treatment.',
                'price' => 500.00,
                'duration' => 60,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

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
            
            // Attach services to doctors
            switch($doctor->name) {
                case 'Dr. John Smith':
                    $doctor->services()->attach([1]); // General Surgery
                    break;
                case 'Dr. Sarah Johnson':
                    $doctor->services()->attach([3]); // Cardiology
                    break;
                case 'Dr. Michael Chen':
                    $doctor->services()->attach([2]); // Orthopedic Surgery
                    break;
                case 'Dr. Emily Williams':
                    $doctor->services()->attach([5]); // Pediatrics
                    break;
                case 'Dr. David Martinez':
                    $doctor->services()->attach([4]); // Neurology
                    break;
                case 'Dr. Lisa Anderson':
                    $doctor->services()->attach([6]); // Dermatology
                    break;
                case 'Dr. Robert Taylor':
                    $doctor->services()->attach([7]); // OB/GYN
                    break;
                case 'Dr. Jennifer Lee':
                    $doctor->services()->attach([8]); // Ophthalmology
                    break;
                case 'Dr. James Wilson':
                    $doctor->services()->attach([9]); // ENT
                    break;
                case 'Dr. Maria Garcia':
                    $doctor->services()->attach([10]); // Dental Services
                    break;
            }
        }
    }
}