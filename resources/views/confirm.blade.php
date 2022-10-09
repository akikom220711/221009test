@extends('layouts.template')

@section('title')
お問い合わせ-確認
@endsection

@section('content')
<div class="all">
  <h3>内容確認</h3>

  <table class="contact_table">
    <tr>
      <th class="contact_th">お名前</th>
      <td class="confirm_td">{{$param['fullname']}}</td>
    </tr>
    <tr>
      <th class="contact_th">性別</th>
      <td class="confirm_td">
        @if ($param['gender'] == 1)
        男性
        @elseif ($param['gender'] == 2)
        女性
        @endif
      </td>
    </tr>
    <tr>
      <th class="contact_th">メールアドレス</th>
      <td class="confirm_td">{{$param['email']}}</td>
    </tr>
    <tr>
      <th class="contact_th">郵便番号</th>
      <td class="confirm_td">{{$param['postcode']}}</td>
    </tr>
    <tr>
      <th class="contact_th">住所</th>
      <td class="confirm_td">{{$param['address']}}</td>
    </tr>
    <tr>
      <th class="contact_th">建物名</th>
      <td class="confirm_td">{{$param['building_name']}}</td>
    </tr>
    <tr>
      <th class="contact_th">ご意見</th>
      <td class="confirm_td">{{$param['opinion']}}</td>
    </tr>
  </table>

  <button class="contact_button" onclick="location.href='/thank'">送信</button>
  <a class="link_modify" href="/modify">修正する</a>

</div>


@endsection