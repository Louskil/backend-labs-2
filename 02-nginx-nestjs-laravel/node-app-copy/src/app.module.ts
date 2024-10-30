import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { SubscribersModule } from './subscribers/subscribers.module';
import { TypeOrmModule } from '@nestjs/typeorm';

@Module({
  imports: [TypeOrmModule.forRoot({
      type: 'postgres',
      host: 'localhost',
      port: 5432,
      username: 'yourUsername',
      password: 'yourPassword',
      database: 'yourDatabase',
      entities: [__dirname + '/**/*.entity{.ts,.js}'],
      synchronize: true,  
    }), SubscribersModule],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
