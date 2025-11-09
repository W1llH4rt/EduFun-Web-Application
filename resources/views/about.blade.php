@extends('layouts.app')

@section('title', 'About Us - EduFun')

@section('styles')
<style>
    .about-container {
        max-width: 960px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
    }

    .about-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #111;
        text-align: center;
        margin-bottom: 2.5rem;
        letter-spacing: 0.5px;
    }

    .about-content {
        background-color: #fafafa;
        border-radius: 12px;
        padding: 2.5rem 2rem;
        line-height: 1.8;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .about-content p {
        font-size: 1.25rem;
        color: #444;
        margin-bottom: 1.5rem;
    }

    .about-content p:last-child {
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .about-title {
            font-size: 1.8rem;
        }

        .about-content p {
            font-size: 1.1rem;
        }

        .about-content {
            padding: 2rem 1rem;
        }
    }
</style>

@endsection

@section('content')
<div class="about-container">
    <h1 class="about-title">About EduFun</h1>
    <div class="about-content">
        <p>
            EduFun adalah perusahaan pendidikan berbasis teknologi asal Indonesia. EduFun menyediakan layanan akses pendidikan dalam format tulisan berbahasa Indonesia yang disajikan secara online melalui website.
        </p>
        <p>
            Hingga Juni 2024, EduFun memiliki lebih dari 10 ribu pengguna. EduFun hadir sebagai bentuk revolusi dari pendidikan di Indonesia dengan mengedepankan cara berpikir kritis, logis, rasional, dan sumber pengetahuan sains yang terintegrasi terhadap semua mahasiswa IT di Indonesia. EduFun bercita-cita mencetak generasi Indonesia yang memahami ilmu pengetahuan dan cinta belajar.
        </p>
    </div>
</div>
@endsection

