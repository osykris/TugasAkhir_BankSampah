<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Bank Sampah Semanding')
<!-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> -->
<img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiFEjl9PId3zSFdRaYa1-z84ZG97kpDQB8Bk_ijQYuJvBChrTA0svDs344X5XM5BIkNPpSfb499TyqwUM2yICSI05045zsWYjH9NDKgCem4oveHmClqMRSn3z6vwUPIcMwGb8B3C3CInPYthBmHwZmyg68VzsjUzGeeRrxNKX-WwhEmchm7KxXLG5A-7g/s2164/white-Semanding.png" style="width: 30%; height:30%; border-radius: 5px;" alt="Semanding Logo">
<!-- <h1 style="color: white;">Semanding Berseri</h1> -->
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
