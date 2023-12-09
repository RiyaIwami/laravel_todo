<style>
    h1 {
        text-align: center;
        padding: 30px;
    }
    .container {
        width: 80%;
        margin: 0 auto;
    }
    table {
        border-spacing: 0;
        border-collapse: collapse;
        border-bottom: 1px solid #aaa;
        color: #555;
        width: 100%;
    }
    th {
        border-top: 1px solid #aaa;
        background-color: #f5f5f5;
        padding: 10px 0 10px 6px;
        text-align: center;
    }
    td {
        border-top: 1px solid #aaa;
        padding: 10px 0 10px 6px;
        text-align: center;
    }

    form {
        display:inline-block;
    }


    a {
        margin-right: 20px;
    }
</style>
<h1>ユーザー一覧</h1>
<table>
    <thead>
        <tr>
            <th>ユーザーネーム</th>
            <th>メールアドレス</th>
            <th>設定</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email}}</td>
            @auth
            <td>
                <a href="{{ route('users.edit', ['id' => $user->id]) }}">編集</a>
                <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST" name="deleteForm">
                @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>
