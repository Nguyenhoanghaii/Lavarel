<form action="{{ route('user.create') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">name :</label>
      <input type="text" class="form-control" id="email" name="name">
    </div>
    <div class="form-group">
      <label for="email">email :</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">password :</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
