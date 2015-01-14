/**
 * Created by PC on 1/14/2015.
 * @return chẹck Validate for Form Register in view index
 * @author
 */

$('#create_acount').validate({
    rules:{

        weddingdate:{
            required:true,
        },
        email:{
            required:true,
            email: true,
            remote:{
                url:url.validateFrmRegister,
                type:"POST"
            }
        },
        password:{
            required:true,
            minlength:6,
        },
        password_confirm:{
            equalTo:'#password',
        }
    },
    messages:{

        weddingdate:{
            required:'Bạn chưa chọn ngày cưới',

        },
        email:{
            required:'Bạn chưa điền email của bạn',
            email:'Định dạng email không đúng',
            remote:'Email này đã tồn tại',
        },
        password:{
            required:'Bạn chưa nhập mật khẩu',
            minlength:'Password ít nhất phải có 6 kí tự',
        },
        password_confirm:{
            equalTo:'Không trùng với mật khẩu bạn đã nhập',
        }
    }
})
