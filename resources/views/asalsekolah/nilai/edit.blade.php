<!-- resources/views/nilai/edit.blade.php -->

@extends('layout/layout')

@section('space-work')

<div class="container">
    <div class="row">
      
        <div class="col-md-6">
            <div class="card shadow mb-4">
            <form action="{{ route('nilai.update', $nilai->id_pendaftar) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <h3 class="card-title">Semester 1</h3>
                    
                    <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s1">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s1" id="nilai_agama_s1" class="form-control" value="{{ $nilaiRapotS1->agama }}">
                        @error('nilai_agama_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s1">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s1" id="nilai_indonesia_s1" class="form-control" value="{{ $nilaiRapotS1->indonesia }}">
                        @error('nilai_indonesia_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s1">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s1" id="nilai_mtk_s1" class="form-control" value="{{ $nilaiRapotS1->mtk }}">
                        @error('nilai_mtk_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s1">Nilai Inggris:</label>
                        <input type="number" name="nilai_inggris_s1" id="nilai_inggris_s1" class="form-control" value="{{ $nilaiRapotS1->mtk }}">
                        @error('nilai_inggris_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PJOK -->
                    <div class="form-group">
                        <label for="nilai_pjok_s1">Nilai PJOK:</label>
                        <input type="number" name="nilai_pjok_s1" id="nilai_pjok_s1" class="form-control" value="{{ $nilaiRapotS1->pjok }}">
                        @error('nilai_pjok_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s1">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s1" id="nilai_ipa_s1" class="form-control" value="{{ $nilaiRapotS1->ipa }}">
                        @error('nilai_ipa_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s1">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s1" id="nilai_ips_s1" class="form-control" value="{{ $nilaiRapotS1->ips }}">
                        @error('nilai_ips_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s1">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s1" id="nilai_pkn_s1" class="form-control" value="{{ $nilaiRapotS1->pkn }}">
                        @error('nilai_pkn_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s1">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s1" id="nilai_komputer_s1" class="form-control" value="{{ $nilaiRapotS1->komputer }}">
                        @error('nilai_komputer_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s1">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s1" id="nilai_sunda_s1" class="form-control" value="{{ $nilaiRapotS1->sunda }}">
                        @error('nilai_sunda_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s1">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s1" id="nilai_seni_s1" class="form-control" value="{{ $nilaiRapotS1->seni }}">
                        @error('nilai_seni_s1')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="card-title">Semester 2</h3>

                    <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s2">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s2" id="nilai_agama_s2" class="form-control" value="{{ $nilaiRapotS2->agama }}">
                        @error('nilai_agama_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s2">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s2" id="nilai_indonesia_s2" class="form-control" value="{{ $nilaiRapotS2->indonesia }}">
                        @error('nilai_indonesia_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s2">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s2" id="nilai_mtk_s2" class="form-control" value="{{ $nilaiRapotS2->mtk }}">
                        @error('nilai_mtk_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s2">Nilai Inggris:</label>
                        <input type="number" name="nilai_inggris_s2" id="nilai_inggris_s2" class="form-control" value="{{ $nilaiRapotS2->mtk }}">
                        @error('nilai_inggris_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_pjok_s2">Nilai PJOK:</label>
                        <input type="number" name="nilai_pjok_s2" id="nilai_pjok_s2" class="form-control" value="{{ $nilaiRapotS2->mtk }}">
                        @error('nilai_pjok_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s2">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s2" id="nilai_ipa_s2" class="form-control" value="{{ $nilaiRapotS2->ipa }}">
                        @error('nilai_ipa_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s2">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s2" id="nilai_ips_s2" class="form-control" value="{{ $nilaiRapotS2->ips }}">
                        @error('nilai_ips_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s2">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s2" id="nilai_pkn_s2" class="form-control" value="{{ $nilaiRapotS2->pkn }}">
                        @error('nilai_pkn_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s2">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s2" id="nilai_komputer_s2" class="form-control" value="{{ $nilaiRapotS2->komputer }}">
                        @error('nilai_komputer_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s2">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s2" id="nilai_sunda_s2" class="form-control" value="{{ $nilaiRapotS2->sunda }}">
                        @error('nilai_sunda_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s2">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s2" id="nilai_seni_s2" class="form-control" value="{{ $nilaiRapotS2->seni }}">
                        @error('nilai_seni_s2')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="card-title">Semester 3</h3>
                    
                    <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s3">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s3" id="nilai_agama_s3" class="form-control" value="{{ $nilaiRapotS3->agama }}">
                        @error('nilai_agama_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s3">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s3" id="nilai_indonesia_s3" class="form-control" value="{{ $nilaiRapotS3->indonesia }}">
                        @error('nilai_indonesia_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s3">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s3" id="nilai_mtk_s3" class="form-control" value="{{ $nilaiRapotS3->mtk }}">
                        @error('nilai_mtk_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s3">Nilai Inggris:</label>
                        <input type="number" name="nilai_inggris_s3" id="nilai_inggris_s3" class="form-control" value="{{ $nilaiRapotS3->mtk }}">
                        @error('nilai_inggris_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_pjok_s3">Nilai PJOK:</label>
                        <input type="number" name="nilai_pjok_s3" id="nilai_pjok_s3" class="form-control" value="{{ $nilaiRapotS3->mtk }}">
                        @error('nilai_pjok_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s3">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s3" id="nilai_ipa_s3" class="form-control" value="{{ $nilaiRapotS3->ipa }}">
                        @error('nilai_ipa_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s3">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s3" id="nilai_ips_s3" class="form-control" value="{{ $nilaiRapotS3->ips }}">
                        @error('nilai_ips_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s3">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s3" id="nilai_pkn_s3" class="form-control" value="{{ $nilaiRapotS3->pkn }}">
                        @error('nilai_pkn_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s3">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s3" id="nilai_komputer_s3" class="form-control" value="{{ $nilaiRapotS3->komputer }}">
                        @error('nilai_komputer_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s3">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s3" id="nilai_sunda_s3" class="form-control" value="{{ $nilaiRapotS3->sunda }}">
                        @error('nilai_sunda_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s3">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s3" id="nilai_seni_s3" class="form-control" value="{{ $nilaiRapotS3->seni }}">
                        @error('nilai_seni_s3')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="card-title">Semester 4</h3>
                    
                     <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s4">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s4" id="nilai_agama_s4" class="form-control" value="{{ $nilaiRapotS4->agama }}">
                        @error('nilai_agama_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s4">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s4" id="nilai_indonesia_s4" class="form-control" value="{{ $nilaiRapotS4->indonesia }}">
                        @error('nilai_indonesia_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s4">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s4" id="nilai_mtk_s4" class="form-control" value="{{ $nilaiRapotS4->mtk }}">
                        @error('nilai_mtk_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s4">Nilai Inggris:</label>
                        <input type="number" name="nilai_inggris_s4" id="nilai_inggris_s4" class="form-control" value="{{ $nilaiRapotS4->mtk }}">
                        @error('nilai_inggris_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_pjok_s4">Nilai PJOK:</label>
                        <input type="number" name="nilai_pjok_s4" id="nilai_pjok_s4" class="form-control" value="{{ $nilaiRapotS4->mtk }}">
                        @error('nilai_pjok_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s4">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s4" id="nilai_ipa_s4" class="form-control" value="{{ $nilaiRapotS4->ipa }}">
                        @error('nilai_ipa_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s4">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s4" id="nilai_ips_s4" class="form-control" value="{{ $nilaiRapotS4->ips }}">
                        @error('nilai_ips_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s4">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s4" id="nilai_pkn_s4" class="form-control" value="{{ $nilaiRapotS4->pkn }}">
                        @error('nilai_pkn_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s4">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s4" id="nilai_komputer_s4" class="form-control" value="{{ $nilaiRapotS4->komputer }}">
                        @error('nilai_komputer_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s4">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s4" id="nilai_sunda_s4" class="form-control" value="{{ $nilaiRapotS4->sunda }}">
                        @error('nilai_sunda_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s4">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s4" id="nilai_seni_s4" class="form-control" value="{{ $nilaiRapotS4->seni }}">
                        @error('nilai_seni_s4')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="card-title">Semester 5</h3>
                    
                    <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s5">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s5" id="nilai_agama_s5" class="form-control" value="{{ $nilaiRapotS5->agama }}">
                        @error('nilai_agama_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s5">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s5" id="nilai_indonesia_s5" class="form-control" value="{{ $nilaiRapotS5->indonesia }}">
                        @error('nilai_indonesia_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s5">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s5" id="nilai_mtk_s5" class="form-control" value="{{ $nilaiRapotS5->mtk }}">
                        @error('nilai_mtk_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s5">Nilai Inggris:</label>
                        <input type="number" name="nilai_inggris_s5" id="nilai_inggris_s5" class="form-control" value="{{ $nilaiRapotS5->mtk }}">
                        @error('nilai_inggris_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_pjok_s5">Nilai pjok:</label>
                        <input type="number" name="nilai_pjok_s5" id="nilai_pjok_s5" class="form-control" value="{{ $nilaiRapotS5->mtk }}">
                        @error('nilai_pjok_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s5">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s5" id="nilai_ipa_s5" class="form-control" value="{{ $nilaiRapotS5->ipa }}">
                        @error('nilai_ipa_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s5">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s5" id="nilai_ips_s5" class="form-control" value="{{ $nilaiRapotS5->ips }}">
                        @error('nilai_ips_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s5">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s5" id="nilai_pkn_s5" class="form-control" value="{{ $nilaiRapotS5->pkn }}">
                        @error('nilai_pkn_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s5">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s5" id="nilai_komputer_s5" class="form-control" value="{{ $nilaiRapotS5->komputer }}">
                        @error('nilai_komputer_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s5">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s5" id="nilai_sunda_s5" class="form-control" value="{{ $nilaiRapotS5->sunda }}">
                        @error('nilai_sunda_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s5">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s5" id="nilai_seni_s5" class="form-control" value="{{ $nilaiRapotS5->seni }}">
                        @error('nilai_seni_s5')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3 class="card-title">Semester 6</h3>
                    <!-- Input untuk nilai Agama -->
                    <div class="form-group">
                        <label for="nilai_agama_s6">Nilai Agama:</label>
                        <input type="number" name="nilai_agama_s6" id="nilai_agama_s6" class="form-control" value="{{ $nilaiRapotS6->agama }}">
                        @error('nilai_agama_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Bahasa Indonesia -->
                    <div class="form-group">
                        <label for="nilai_indonesia_s6">Nilai Bahasa Indonesia:</label>
                        <input type="number" name="nilai_indonesia_s6" id="nilai_indonesia_s6" class="form-control" value="{{ $nilaiRapotS6->indonesia }}">
                        @error('nilai_indonesia_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_mtk_s6">Nilai Matematika:</label>
                        <input type="number" name="nilai_mtk_s6" id="nilai_mtk_s6" class="form-control" value="{{ $nilaiRapotS6->mtk }}">
                        @error('nilai_mtk_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_inggris_s6">Nilai nilai_inggris_s6:</label>
                        <input type="number" name="nilai_inggris_s6" id="nilai_inggris_s6" class="form-control" value="{{ $nilaiRapotS6->mtk }}">
                        @error('nilai_inggris_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Matematika -->
                    <div class="form-group">
                        <label for="nilai_pjok_s6">Nilai nilai_pjok_s6:</label>
                        <input type="number" name="nilai_pjok_s6" id="nilai_pjok_s6" class="form-control" value="{{ $nilaiRapotS6->mtk }}">
                        @error('nilai_pjok_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPA -->
                    <div class="form-group">
                        <label for="nilai_ipa_s6">Nilai IPA:</label>
                        <input type="number" name="nilai_ipa_s6" id="nilai_ipa_s6" class="form-control" value="{{ $nilaiRapotS6->ipa }}">
                        @error('nilai_ipa_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai IPS -->
                    <div class="form-group">
                        <label for="nilai_ips_s6">Nilai IPS:</label>
                        <input type="number" name="nilai_ips_s6" id="nilai_ips_s6" class="form-control" value="{{ $nilaiRapotS6->ips }}">
                        @error('nilai_ips_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai PKN -->
                    <div class="form-group">
                        <label for="nilai_pkn_s6">Nilai PKN:</label>
                        <input type="number" name="nilai_pkn_s6" id="nilai_pkn_s6" class="form-control" value="{{ $nilaiRapotS6->pkn }}">
                        @error('nilai_pkn_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Komputer -->
                    <div class="form-group">
                        <label for="nilai_komputer_s6">Nilai Komputer:</label>
                        <input type="number" name="nilai_komputer_s6" id="nilai_komputer_s6" class="form-control" value="{{ $nilaiRapotS6->komputer }}">
                        @error('nilai_komputer_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Sunda -->
                    <div class="form-group">
                        <label for="nilai_sunda_s6">Nilai Sunda:</label>
                        <input type="number" name="nilai_sunda_s6" id="nilai_sunda_s6" class="form-control" value="{{ $nilaiRapotS6->sunda }}">
                        @error('nilai_sunda_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Input untuk nilai Seni -->
                    <div class="form-group">
                        <label for="nilai_seni_s6">Nilai Seni:</label>
                        <input type="number" name="nilai_seni_s6" id="nilai_seni_s6" class="form-control" value="{{ $nilaiRapotS6->seni }}">
                        @error('nilai_seni_s6')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                        <input type="submit" value="Simpan Semester 6" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
