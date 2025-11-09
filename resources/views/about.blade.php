@extends('layouts.app')

@section('title', 'About Us - EduFun')

@section('styles')

<style>
    .about-wrapper {
        max-width: 900px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
    }

    .about-header {
        font-size: 2.3rem;
        font-weight: 700;
        color: #1a1a1a;
        text-align: center;
        margin-bottom: 2.5rem;
        letter-spacing: 0.5px;
    }

    .about-section {
        background-color: #f9fafb;
        border-radius: 12px;
        padding: 2.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        line-height: 1.8;
    }

    .about-section p {
        font-size: 1.1rem;
        color: #444;
        text-align: justify;
        margin-bottom: 1.8rem;
    }

    .about-section p:last-child {
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')
<div class="about-wrapper">
    <h1 class="about-header">Tentang EduLearn</h1>
    <div class="about-section">
        <p>
            EduLearn merupakan platform pembelajaran digital karya anak bangsa yang berfokus pada penyediaan akses pengetahuan berbasis teknologi. Melalui situs web interaktif, EduLearn menghadirkan berbagai materi edukatif berbahasa Indonesia yang mudah dijangkau oleh siapa pun.
        </p>
        <p>
            Per Juni 2024, platform ini telah digunakan oleh lebih dari 10.000 pelajar di seluruh Indonesia. EduLearn berkomitmen untuk menjadi bagian dari transformasi pendidikan nasional dengan menanamkan pola pikir kritis, analitis, dan ilmiah. Tujuan akhirnya adalah membangun generasi muda yang haus akan ilmu, berpikir rasional, dan mencintai proses belajar sepanjang hayat.
        </p>
    </div>
</div>
@endsection
