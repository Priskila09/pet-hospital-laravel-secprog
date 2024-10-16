@extends('layouts.home')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="text-center mb-5">About Us</h1>

            <div class="row mb-5 justify-content-center align-items-center">
                <div class="col-md-6">
                    <h2>Our Story</h2>
                    <p>
                        Welcome to our Pet Hospital! We have been serving the community with the highest level of veterinary
                        care. Our dedicated team of professionals is committed to providing exceptional medical, surgical,
                        and dental care for your beloved pets.
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ url('assets2/images/about-us.png') }}" alt="About Us Image" class="img-fluid"
                        style="max-width: 300px;">
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <h2>Our Facilities</h2>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <img src="{{ url('assets2/images/surgical.jpg') }}" alt="Facility 1" class="img-fluid rounded">
                            <h5 class="mt-3">Modern Surgical Suite</h5>
                            <p>
                                Our state-of-the-art surgical suite is equipped with the latest technology to ensure your
                                pet receives the best care possible during surgery.
                            </p>
                        </div>
                        <div class="col-md-4 mb-4">
                            <img src="{{ url('assets2/images/diagnosti.jpg') }}" alt="Facility 2" class="img-fluid rounded">
                            <h5 class="mt-3">Comprehensive Diagnostics</h5>
                            <p>
                                We offer a full range of diagnostic services, including X-rays, ultrasounds, and laboratory
                                testing, to accurately diagnose your pet's condition.
                            </p>
                        </div>
                        <div class="col-md-4 mb-4">
                            <img src="{{ url('assets2/images/hotel.jpg') }}" alt="Facility 3" class="img-fluid rounded">
                            <h5 class="mt-3">Comfortable Boarding</h5>
                            <p>
                                Our boarding facilities are designed to provide a comfortable and safe environment for your
                                pet while you're away.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <h2>Price List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Consultation</td>
                                <td>Rp. 200.000</td>
                            </tr>
                            <tr>
                                <td>Vaccination</td>
                                <td>Rp. 450.000</td>
                            </tr>
                            <tr>
                                <td>Dental Cleaning</td>
                                <td>Rp. 250.000</td>
                            </tr>
                            <tr>
                                <td>Spay/Neuter Surgery</td>
                                <td>Rp. 200.000</td>
                            </tr>
                            <tr>
                                <td>Boarding (per day)</td>
                                <td>Rp. 175.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12">
                    <h2>Our Pets Gallery</h2>
                    <div class="row">
                        @foreach (['offer-1.jpeg', 'pets10.jpg', 'offer-3.jpeg', 'pets4.jpg', 'pets5.jpg', 'pets6.jpg', 'pets7.jpg', 'pets8.jpg', 'offer-2.jpeg', 'pets9.jpg', 'pets11.jpg', 'pets12.jpg'] as $image)
                            <div class="col-md-3 mb-4">
                                <img src="{{ asset('assets2/images/pets/' . $image) }}" alt="{{ $image }}"
                                    class="img-fluid rounded">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <h2>Contact Us</h2>
                    <p>
                        If you have any inquiries about us, please don't hesitate to contact
                        us at (123) 456-7890 or email us at pethospital.com.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
