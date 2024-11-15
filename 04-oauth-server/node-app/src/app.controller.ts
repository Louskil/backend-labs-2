@Controller()
export class UserController {
  constructor(private readonly userService: UserService) {}
@Get('/public')
  @Unprotected()
  getpublic(): string {
    return `${this.userService.getHello()} from public`;
  }
@Get('/user')
  @Roles('user')
  getUser(): string {
    return `${this.userService.getHello()} from user`;
  }
@Get('/admin')
  @Roles('admin')
  getAdmin(): string {
    return `${this.userService.getHello()} from admin`;
  }
@Get('/all')
  @AllowAnyRole()
  getAll(): string {
    return `${this.userService.getHello()} from all`;
  }
}