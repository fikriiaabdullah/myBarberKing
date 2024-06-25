@extends('layout.app')

@section('content')
<div class="container">
    <h2>Reservasi Baru</h2>
    <form>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="time">Waktu</label>
            <input type="date" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="layanan_id">Layanan</label>
            <select class="form-control" id="layanan_id" name="layanan_id" required>
                <option value="1">Layanan 1</option>
                <option value="2">Layanan 2</option>
                <!-- Tambahkan opsi layanan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="form-group">
            <label for="barberman_id">Barberman</label>
            <select class="form-control" id="barberman_id" name="barberman_id" required>
                <option value="1">Barberman 1</option>
                <option value="2">Barberman 2</option>
                <!-- Tambahkan opsi barberman lainnya sesuai kebutuhan -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Reservasi</button>
    </form>
</div>
@endsection
