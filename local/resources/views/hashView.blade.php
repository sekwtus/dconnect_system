                @php
                  $users = DB::select('SELECT
                    users.id,
                    users.username,
                    users.name,
                    users.password,
                    users.real_pass
                    FROM users
                    where users.id > 168
                  ',[]);
                  echo count($users);
                @endphp

                <table class="table-bordered">
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>password</th>
                    <th>real_pass</th>
                  </tr>

                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->password }}</td>
                      <th>{{ $user->real_pass }}</th>
                    </tr>

                    {{-- @php
                      // $hash = password_hash($pass, PASSWORD_DEFAULT);
                      $password_hash = bcrypt($user->real_pass);

                      $update_password = DB::table('users')->where(['users.id'=>$user->id])
                        ->update([
                          'password'=>$password_hash
                        ]);
                    @endphp --}}
                    
                  @endforeach
                </table>