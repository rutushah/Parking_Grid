package com.indexPage.HomeIndexPage;

import com.initialization.AbstractPage;
import com.verification.HomeVerification.SelectVerification;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class SelectRoleIndexPage extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public SelectRoleIndexPage(WebDriver driver) {
        super(driver);
    }


    //-----------------------------Variable Declaration Section-------------------------------------


    //----------------------------Locator's Definition Section-------------------------------------
    @FindBy(xpath = "//a[@class='nav-link col px-md-5'][normalize-space()='Home']")
    private WebElement btnHome;

    @FindBy(xpath = "//label[normalize-space()='Admin']//input")
    private WebElement admin;

    @FindBy(xpath = "//label[normalize-space()='Customer']//input")
    private WebElement customer;

    @FindBy(xpath = " //input[@id='next']")
    private WebElement btnNext;

    //-----------------------Method Declaration Section----------------------

    public  SelectVerification goToHomePage(){
        log("Step : " +_logStep++ + " Go back to home page.");
        highlightElement(driver,btnHome);
        btnHome.click();
        return new SelectVerification(driver);
    }

    public SelectVerification clickOnNextButton(){
        log("Step : " +_logStep++ + " Click on Next button");
        highlightElement(driver,btnNext);
        btnNext.click();
        return new SelectVerification(driver);
    }

    public SelectVerification selectOnCustomer(){
        log("Step : " +_logStep++ + " Click on Customer button");
        highlightElement(driver,customer);
        customer.click();
        return new SelectVerification(driver);
    }

    public SelectVerification selectOnAdmin(){
        log("Step : " +_logStep++ + " Click on Admin button");
        highlightElement(driver,admin);
        admin.click();
        return new SelectVerification(driver);
    }
}
