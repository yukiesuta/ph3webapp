@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <header>
        <section class="header_container">
            <div><img src="{{ asset('image/posseLogo.png') }}" alt="logo" class="logo"></div>
            <div class="week">4th week</div>
            <div class="link c_pointer" id="open" onclick="showModal()">記録・投稿</div>
            <?php
            if ($admin == 1) {
                echo '<a href="admin">管理画面へ</a>';
            }
            ?>
    </header>
    <div class="all_container">
        <div class="main">
            <div class="main_first_container">
                <div class="hour">
                    <div class="hour_box"><span class="period">Today</span><br><span class="figure">{{ $today_study_hours }}
                        </span><br><span class="unit">hour</div>
                    <div class="hour_box"><span class="period">Month</span><br><span class="figure">{{ $month_study_hours }}
                        </span><br><span class="unit">hour</div>
                    <div class="hour_box"><span class="period">Total</span><br><span class="figure">{{ $total_study_hours }}
                        </span><br><span class="unit">hour</div>
                </div>
                <div class="bar_graph">
                    <div id="chart_div"></div>
                </div>
            </div>
            <div class="main_second_container">
                <div class="pie_container">
                    <canvas id="sircleGrafLanguages1"></canvas>
                </div>
                <div class="pie_container">
                    <canvas id="sircleGrafLanguages2"></canvas>
                </div>
            </div>
            <div class="link_resp c_pointer" id="open_resp" onclick="showModal()">
                <p>記録・投稿フォーム</p>
            </div>
        </div>
        <div class="bottom_month">2020年 10月</div>
        <div id="modal" class="modal">
            <div class="modal_close c_pointer" id="close" onclick="modalClose()">
                x
            </div>
            <div class="loading" id="loading">
            </div>
            <div class="modal_top" id="m_top">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal_first_container">
                        <div class="study_day">
                            <dt>学習日</dt>
                            <dd><input type="date" name="date"></dd>
                        </div>
                        <div class="study_contents">
                            <dt>学習コンテンツ（複数選択可）</dt>
                            <ul class="modal_contents">
                                <?php
                                foreach ($study_contents_result_array as $item) {
                                ?>
                                <dd>
                                    <li class="modal_contents_option c_pointer"><input type="checkbox"
                                            name="content<?= $item->id ?>" />
                                        <?= $item->content ?></li>
                                </dd>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="study_language">
                            <dt>学習言語（複数選択可）</dt>
                            <ul class="modal_language">
                                <?php
                                foreach ($study_languages_result_array as $item) {
                                ?>
                                <dd>
                                    <li class="modal_contents_option c_pointer"><input type="checkbox"
                                            name="language<?= $item->id ?>" />
                                        <?= $item->language ?></li>
                                </dd>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="modal_second_container">
                        <div class="study_time">
                            <dt><label for="name">学習時間</label></dt>
                            <dd><input id="name" type="text" name="study_hour"></dd>
                        </div>
                        <div class="twitter_comment">
                            <dt><label for="name">twitter用コメント</label></dt>
                            <dd><input id="name2" type="text"></dd>
                        </div>
                        <div class="twitter_share">
                            <input type="checkbox" id="check" name="check" value=true />
                            <div>twitterにシェアする</div>
                        </div>
                    </div>
            </div>
            <input type="submit" class="modal_bottom c_pointer" id="posting" value="記録・投稿">
            </form>
        </div>
        <div class="mask c_pointer" id="mask" onclick="modalClose()"></div>
        <div id="js-loader" class="loader"></div>
    </div>
    <script type="application/javascript">
        // データ配列
        const js_array =  @json($study_datum_array) ;
        // 言語の凡例配列
        const study_languages_array = @json($study_languages_result_array);
        // 教材の凡例配列
        const study_contents_array = @json($study_contents_result_array) ;
        // 言語ごとの勉強時間配列
        const study_hour_datum_array = @json($study_hour_datum_array);
        // 教材ごとの勉強時間配列
        const study_contents_datum_array = @json($study_contents_datum_array);
    </script>
    <script src="{{ asset('js/webapp.js') }}"></script>
@endsection
