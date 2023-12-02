<style>
    h1 {
        text-align: center;
        padding: 30px;
    }
    .form {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }
    .form-group {
        padding-bottom: 50px;
    }
    span {
        color: red;
    }
    textarea {
        width: 60%;
    }
</style>
<h1>ユーザー編集</h1>
<form action="{{ route('users.update', ['id' => $user
->id]) }}" method="POST" class="form">
@csrf
    <div class="form-group">
        <label for="name">ユーザーネーム<span>(必須)</span></label><br>
        <input type="text" name="name" maxlength="10" placeholder="10文字で書きましょう。" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label for="email">メールアドレス<span>(必須)</span></label><br>
        <input type="text" name="email" placeholder="email" value="{{$user->email}}">
    </div>
    <button type="submit">変更する</button>
</form>
