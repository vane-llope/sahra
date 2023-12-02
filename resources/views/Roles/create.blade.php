<x-layout>
    <x-form-layout>
                      <p class="text-center h1 fw-bold mb-3  mt-4"> ایجاد نقش </p>
                      <div class="overflow-auto">
                      <form method="POST" action="/roles">
                        @csrf
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input placeholder="نام" type="text" name="name" id="form3Example1c" class="form-control" />
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <table class="table">
                            @foreach ($entities as $entity)
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <label class="form-label" for="form3Example1c">{{ $entity->name }} :</label>
                                        </th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][create]" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    create
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][remove]" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    remove
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][update]" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    update
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[{{ $entity->id }}][display]" value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    display
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-danger btn-lg w-100">ثبت</button>
                        </div>
                    </form>
                    <div class="overflow-auto">
                </x-form-layout>
  </x-layout>