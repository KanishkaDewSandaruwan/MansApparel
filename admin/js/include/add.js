addCategory = (form) => {
    let fd = new FormData(form);

    if (fd.get('category_name').trim() != '') {
        if (fd.get("file") != '') {

            $.ajax({
                method: "POST",
                url: API_PATH + "addCategory",
                data: fd,
                success: function ($data) {
                    console.log($data);

                    if ($data > 0) {
                        errorMessage("This Category Already Registerd!");
                    } else {
                        successToast();

                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Category Name"); }
}


addColor = (form) => {
    let fd = new FormData(form);

    if (fd.get('color_name').trim() != '') {
        if (fd.get('color_code').trim() != '') {


            $.ajax({
                method: "POST",
                url: API_PATH + "addColor",
                data: fd,
                success: function ($data) {
                    console.log($data);

                    if ($data > 0) {
                        errorMessage("This Color Already Registerd!");
                    } else {
                        successToast();

                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please Enter Color Code"); }
    } else { errorMessage("Please Enter Category Name"); }
}

addSize = (form) => {
    let fd = new FormData(form);

    if (fd.get('size_name').trim() != '') {
        if (fd.get('size_description').trim() != '') {


            $.ajax({
                method: "POST",
                url: API_PATH + "addSize",
                data: fd,
                success: function ($data) {
                    console.log($data);

                    if ($data > 0) {
                        errorMessage("This Size Already Registerd!");
                    } else {
                        successToast();

                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please Enter Description"); }
    } else { errorMessage("Please Enter Size Name"); }
}

addItems = (form) => {
    let fd = new FormData(form);

    if (fd.get("product_name")) {
        if (fd.get("file")) {

            $.ajax({
                method: "POST",
                url: API_PATH + "addProducts",
                data: fd,
                success: function ($data) {
              
                    if ($data > 0) {
                        errorMessage("This Size Already Registerd!");
                    } else {
                        successToast();
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Product Name"); }
}

changeDescription = (form) => {
    let fd = new FormData(form);

    $.ajax({
        method: "POST",
        url: API_PATH + "changeDescription",
        data: fd,
        success: function ($data) {
            console.log($data);
            loading("Product Description Saving Success..")
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}
changeAboutDescription = (form) => {
    let fd = new FormData(form);

    $.ajax({
        method: "POST",
        url: API_PATH + "changeAboutDescription",
        data: fd,
        success: function ($data) {
            console.log($data);
            loading("About Description Saving Success..")
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

addSlideshow = (form) => {
    let fd = new FormData(form);

    if (fd.get('slideshow_title').trim() != '') {
        if (fd.get("file") != '') {

            $.ajax({
                method: "POST",
                url: API_PATH + "addslideshowimages",
                data: fd,
                success: function ($data) {
                    console.log($data);

                  
                        successToast();

                    
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter slide show"); }
}

insertImage = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "insertImageUpload",
        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

insertImageAbout = (ele) => {
    var formData = new FormData(ele);

    $.ajax({
        method: "POST",
        url: API_PATH + "insertImageUploadAbout",
        data: formData,
        success: function ($data) {
            console.log($data);
            loading("Image Uploding...");
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

addCustomer = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {
                        if (fd.get('password').trim() != '') {
                            if (fd.get('conf_password').trim() != '') {
                                if (fd.get('password') == fd.get('conf_password')) {
                                    if (emailvalidation(fd.get('email'))) {
                                        if (phonenumber(fd.get('phone'))) {

                                            $.ajax({
                                                method: "POST",
                                                url: API_PATH + "addCustomer",
                                                data: fd,
                                                success: function ($data) {
                                                    console.log($data);

                                                    if ($data > 0) {
                                                        errorMessage("This Customer Already Registerd!");
                                                    } else {
                                                        successToastRedirect('login.php');
                                                    }
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                error: function (error) {
                                                    console.log(`Error ${error}`);
                                                }
                                            });

                                        }
                                    }
                                } else { errorMessage("Password is Not Match"); }
                            } else { errorMessage("Please Confirm Password"); }
                        } else { errorMessage("Please Enter Password"); }
                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}