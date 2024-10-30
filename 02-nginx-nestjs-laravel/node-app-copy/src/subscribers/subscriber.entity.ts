import { Entity, Column, PrimaryGeneratedColumn } from 'typeorm';

@Entity()
export class Subscriber {
  @PrimaryGeneratedColumn()
  id: number;

  @Column()
  name: string;

  @Column()
  email: string;

}