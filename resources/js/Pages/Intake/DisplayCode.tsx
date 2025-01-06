import type {Participant} from "@/types/app/participants";

interface PageProps  {
    participantCode: string
    participant: Participant,

}

export default function DisplayCodePage({ participantCode, participant }: PageProps) {

    // Enter the participant code
    return <div>{participantCode}</div>;
}