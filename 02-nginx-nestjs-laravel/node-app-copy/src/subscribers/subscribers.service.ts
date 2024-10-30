import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { Subscriber } from './subscriber.entity';

@Injectable()
export class SubscribersService {
  constructor(
    @InjectRepository(Subscriber)
    private subscriberRepository: Repository<Subscriber>,
  ) {}

  findAll(): Promise<Subscriber[]> {
    return this.subscriberRepository.find();
  }

  findOne(id: number): Promise<Subscriber> {
    return this.subscriberRepository.findOne(id);
  }

  create(subscriber: Subscriber): Promise<Subscriber> {
    return this.subscriberRepository.save(subscriber);
  }

  async remove(id: number): Promise<void> {
    await this.subscriberRepository.delete(id);
  }
}