require("./bootstrap");
require("./bootstrap.min");
require("./datepicker.min");
require("./datepicker.min");
require("./main");
import { flare } from "@flareapp/flare-client";

// only launch in production, we don't want to waste your quota while you're developing.
if (process.env.NODE_ENV === "production") {
    flare.light("McTqNT0q5FEFuxHF9v7iEHWW1eU8wFgx");
}
