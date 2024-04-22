<form action="{{ route('product.create') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">name :</label>
      <input type="text" class="form-control" id="email" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">price :</label>
      <input type="text" class="form-control" id="pwd" name="price">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
