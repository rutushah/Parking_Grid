package com.verification.CustomerVerification;

import com.github.javafaker.Faker;

import java.util.Locale;

public class Test {

    private static Faker faker = new Faker(new Locale("en-IND"));


    public static void main(String[] args) {


    int _test = getRandomNumberBetween(000000,999999);
        System.out.println(_test);


    }



    public static int getRandomNumberBetween(int min, int max) {
        return faker.number().numberBetween(min, max);
    }

}
