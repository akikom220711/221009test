@extends('layouts.template')

@section('title')
管理システム
@endsection

@section('content')
<div class="all">
<h3>管理システム</h3>
<div class="search_region">
  <form action="/search" method="POST">
    @csrf
    <table class="name_table">
      <tr>
        <th class="contact_th">お名前</th>
        <td class="search_td"><input class="search_txt" type="text" name="search_name"></td>
      </tr>
    </table>

    <table class="gender_table">
      <tr>
        <th class="search_th_gender">性別</th>
        <td class="search_td_">
          <label class="contact_radio_label"><input class="contact_radio_m" type="radio" name="search_gender" value="0" checked>全て</label>
          <label class="contact_radio_label"><input class="contact_radio_w" type="radio" name="search_gender" value="1">男性</label>
          <label class="contact_radio_label"><input class="contact_radio_w" type="radio" name="search_gender" value="2">女性</label>
        </td>
      </tr>
    </table>

    <table>
      <tr>
        <th class="contact_th">登録日</th>
        <td class="search_td_date">
          <input class="search_txt" type="date" name="date_forth">～<input class="search_txt" type="date" name="date_back">
        </td>
      </tr>
      <tr>
        <th class="contact_th">メールアドレス</th>
        <td class="search_td_date">
          <input class="search_txt" type="text" name="search_email">
        </td>
      </tr>
    </table>

    <input class="contact_button" type="submit" value="検索">
  </form>
  <a class="link_reset" href="/manage">リセット</a>
</div>

<div class="pagi_region">
  <p class="pagi_txt">全{{ $results->total() }}件中
  {{ $results->firstItem() }}〜{{ $results->lastItem() }} 件</p>
  <!--{{ $results->links('vendor.pagination.default_modify') }}-->
  {{$results->appends(request()->query())->links('vendor.pagination.default_modify')}}
</div>

<div class="result_region">
  <table>
    <tr>
      <th class="result_th">ID</th>
      <th class="result_th">お名前</th>
      <th class="result_th">性別</th>
      <th class="result_th">メールアドレス</th>
      <th class="result_th_left">ご意見</th>
      <th class="result_th_left"></th>
    </tr>
    @foreach($results as $result)
    <tr>
      <td class="result_td">{{ $result->id }}</td>
      <td class="result_td">{{ $result->fullname }}</td>
      <td class="result_td">@if ($result->gender == 1)
        男性
        @elseif ($result->gender == 2)
        女性
        @endif
      </td>
      <td class="result_td">{{ $result->email }}</td>
      <td class="popup_parent result_td_left">
        <?php echo mb_strimwidth($result->opinion, 0, 25, '…', 'UTF-8')?>
        <p class="popup_child">{{ $result->opinion }}</p>
      </td>
      <td class="result_td"><button class="delete_button" onclick="location.href='{{route('delete',['id' => $result->id])}}'">削除</button></td>
    </tr>
    @endforeach
  </table>
</div>
</div>


@endsection
