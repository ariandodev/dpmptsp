@extends('admin.master')

@section('title', 'Dashboard')

@section('main')
<div class="pagetitle">
    <h1><b>DASHBOARD</b></h1>
</div><!-- End Page Title -->

<section class="section dashboard">
    <p>HAHA</p>
</section>    
@endsection

@section('js')
<script>
    (() => {
        let $currentSidebarParent = document.querySelector('.admin-home');    
        $currentSidebarParent.classList.remove('collapsed');
    })();
</script>
@endsection